<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use App\Models\MataPelajaran;
use App\Models\Materi;
use App\Models\Thread;
use App\Models\BalasanThread;
use App\Models\User;
use App\Models\Guru;
use App\Models\Admin;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

class ForumController extends Controller
{
    public function __invoke(){
        // 
    }

    public function index(Forum $forum, MataPelajaran $mapel){
        $dataforum = $forum->IDForum;
        $IDForum = Forum::find($IDForum);
        
        $namaKelas = DB::table('Kelas')
        ->select('NamaKelas')
        ->get();

        $siswa = DB::table('Users')
        ->join('Kelas','Users.id', '=', 'Kelas.IDPengguna')
        ->join('Forum', 'Kelas.id', '=', 'Forum.IDKelas',)
        ->select('Kelas.*', 'Users.*')
        ->where([
            ['Users.PeranPengguna', 'Siswa'],
            ['Users.KelasSiswa', $namaKelas]
        ])
        ->get();

        $mapel = DB::table('Forum')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'Forum.IDMataPelajaran')
        ->join('Kelas', 'Kelas.id', '=', 'Forum.IDKelas')
        ->select('MataPelajaran.*', 'Kelas.*', 'Forum.*')
        ->where('MataPelajaran.PeruntukanKelas', '=', $namaKelas)
        ->where('Forum.PeruntukanKelas', '=', $namaKelas)
        ->get();
        
        return view('mata_pelajaran.forum-untuk-siswa', compact('dataforum'));
    }

    public function untukAdmin(Forum $forum, Materi $materi){
        $IDForum = $forum->id;
        $dataForum = Forum::find($IDForum);

        $IDMateri = $materi->id;
        $dataMateri = Materi::find($IDMateri);

        $thread = DB::table('Thread')->select('*')->get();

        $namaMataPelajaran = DB::table('MataPelajaran')
        ->select('NamaMataPelajaran')
        ->get();

        $mapel = DB::table('Forum')
        ->join('MataPelajaran', 'Forum.IDMataPelajaran', '=', 'MataPelajaran.id')
        ->join('Users', 'MataPelajaran.IDPengguna', '=', 'Users.id')
        ->select('MataPelajaran.*', 'Forum.*', 'Users.*')
        ->where([
            ['Users.PeranPengguna', '=', 'Guru'], 
            ['Users.MataPelajaran', '=', $namaMataPelajaran]
        ])
        ->orWhere([
            ['Users.PeranPengguna', '=', 'Guru'],
            ['Users.MataPelajaran2', '=', $namaMataPelajaran]
        ])
        ->orWhere([
            ['Users.PeranPengguna', '=', 'Guru'],
            ['Users.MataPelajaran3', '=', $namaMataPelajaran]
        ]) 
        ->orWhere([
            ['Users.PeranPengguna', '=', 'Guru'],
            ['Users.MataPelajaran4', '=', $namaMataPelajaran]
        ])
        ->limit(1);

        $jumlahThread = DB::table('Thread')->count();

        return view('mata_pelajaran.lihat-forum', compact('dataForum', 'mapel', 'dataMateri', 'namaMataPelajaran', 'jumlahThread', 'thread'));
    }

    public function untukGuru(Forum $forum, MataPelajaran $mapel){
        $IDForum = $forum->id;
        $dataForum = Forum::find($IDForum);

        $namaMataPelajaran = DB::table('MataPelajaran')
        ->select('NamaMataPelajaran')
        ->get();

        $mapel = DB::table('Forum')
        ->join('MataPelajaran', 'Forum.IDMataPelajaran', '=', 'MataPelajaran.id')
        ->join('Users', 'MataPelajaran.IDPengguna', '=', 'Users.id')
        ->select('MataPelajaran.*', 'Forum.*', 'Users.*')
        ->where([
            ['Users.PeranPengguna', '=', 'Guru'], 
            ['Users.MataPelajaran', '=', $namaMataPelajaran]
        ])
        ->orWhere([
            ['Users.PeranPengguna', '=', 'Guru'],
            ['Users.MataPelajaran2', '=', $namaMataPelajaran]
        ])
        ->orWhere([
            ['Users.PeranPengguna', '=', 'Guru'],
            ['Users.MataPelajaran3', '=', $namaMataPelajaran]
        ]) 
        ->orWhere([
            ['Users.PeranPengguna', '=', 'Guru'],
            ['Users.MataPelajaran4', '=', $namaMataPelajaran]
        ])
        ->limit(1);
        return view('mata_pelajaran.forum-untuk-guru', compact('dataForum'));
    }

    public function inputThreadGuru(){
        return view('mata_pelajaran.thread-baru-guru');
    }

    public function inputThreadSiswa(){
        return view('mata_pelajaran.thread-baru-siswa');
    }

    public function lihatForum(Forum $forum, MataPelajaran $mapel, Materi $materi){
        $IDForum = $forum->id;
        $dataForum = Forum::find($IDForum);

        $IDMataPelajaran = $mapel->id;
        $dataMataPelajaran = MataPelajaran::find($IDMataPelajaran);

        $IDMateri = $materi->id;
        $dataMateri = Materi::find($IDMateri);

        $thread = Thread::join('Forum', 'Forum.id', '=', 'Thread.IDForum')->join('MataPelajaran', 'MataPelajaran.id', '=', 'Forum.IDMataPelajaran')->select('*');

        $jumlahThread = Thread::join('Forum', 'Forum.id', '=', 'Thread.IDForum')->join('MataPelajaran', 'MataPelajaran.id', '=', 'Forum.IDMataPelajaran')->select('*');

        return view('mata_pelajaran.lihat-forum', compact('dataForum', 'dataMataPelajaran', 'dataMateri', 'thread'));
    }

    public function tambahForum(){
        return view('mata_pelajaran.tambah-forum');
    }

    public function revisiForum(Forum $forum){
        $IDForum = $forum->id;
        $dataForum = Forum::findOrFail($IDForum);
        return view('mata_pelajaran.sunting-forum', compact('dataForum'));
    }

    public function suntingForum(Request $request, Forum $forum){
        $request->validate([
            'JudulForum' => 'required | min: 3',
            'DeskripsiForum' => 'required | min : 3',
            'PeruntukanKelas' => 'required | min : 3'
        ]);

        $request->IDMataPelajaran = DB::table('Forum')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'Forum.IDMataPelajaran')
        ->select('MataPelajaran.*', 'Forum.*')
        ->get();

        $request->IDKelas = DB::table('Forum')
        ->join('Kelas', 'Kelas.id', '=', 'Forum.IDKelas')
        ->select('Kelas.*', 'Forum.*')
        ->get();

        $IDForum = $forum->id;
        $dataForum = Forum::findOrFail($IDForum);

        $dataForum->update([
            'JudulForum' => $request->JudulForum,
            'DeskripsiForum' => $request->DeskripsiForum,
            'PeruntukanKelas' => $request->PeruntukanKelas,
            'IDMataPelajaran' => $request->IDMataPelajaran,
            'IDKelas' => $request->IDKelas
        ]);

        return redirect()->route('mata_pelajaran.lihat-forum')->with(['success' => 'Forum berhasil diperbarui!']);
    }

    public function forumBaru(Request $request){
        $forum = new Forum();
        $forum->JudulForum = $request->JudulForum;
        $forum->DeskripsiForum = $request->DeskripsiForum;
        $forum->PeruntukanKelas = $request->PeruntukanKelas;
        $forum->IDMataPelajaran = $request->IDMataPelajaran;
        $forum->IDKelas = $request->IDKelas;

        $request->IDMataPelajaran = DB::table('Forum')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'Forum.IDMataPelajaran')
        ->select('MataPelajaran.*', 'Forum.*')
        ->get();

        $request->IDKelas = DB::table('Forum')
        ->join('Kelas', 'Kelas.id', '=', 'Forum.IDKelas')
        ->select('Kelas.*', 'Forum.*')
        ->get();

        $request->validate([
            'JudulForum' => 'required | min: 3',
            'DeskripsiForum' => 'required | min : 3',
            'PeruntukanKelas' => 'required | min : 3'
        ]);

        $forum->save();

        return redirect()->route('admin.lihat-mata-pelajaran')->with(['success' => 'Forum Baru berhasil Ditambahkan!']);
    }

    public function threadBaruGuru(Request $request){
        $threadBaru = new Thread();
        $threadBaru->JudulThread = $request->JudulThread;
        $threadBaru->IsiThread = $request->IsiThread;
        $threadBaru->BerkasThread = $request->BerkasThread;
        $threadBaru->IDPengguna = $request->IDPengguna;
        $threadBaru->IDForum = $request->IDForum;

        $request->IDPengguna = DB::table('Thread')
        ->join('Users', 'Thread.IDPengguna', '=', 'Users.id')
        ->select('Users.*', 'Thread.*')
        ->where('Users.PeranPengguna', '=', 'Guru')
        ->get();

        $request->IDForum = DB::table('Thread')
        ->join('Forum', 'Forum.id', '=', 'Thread.IDForum')
        ->join('Users', 'Users.id', '=', 'Thread.IDPengguna')
        ->select('Forum.*', 'Thread.*')
        ->get();
        
        $request->validate([
            'BerkasThread' => 'required | mimes:png, jpg, jpeg, doc, docx, xls, xlsx, ppt, pdf, pptx, 
            zip, rar, 7z, gz | max:50000',
            'JudulThread' => 'required | min : 5',
            'IsiThread' => 'required | min : 10'
        ]);

        $namaBerkas = 'Lampiran Thread Guru-'.time().' pada Thread yang berjudul '.$request->JudulThread.'.'.$request->file('BerkasThread')->extension();  
        $lokasi = $request->file('BerkasThread')->storeAs('uploads/Lampiran-Thread-Guru/', $namaBerkas);

        $threadBaru->save();

        return redirect()->route('mata_pelajaran.forum-untuk-guru')->with(['success'=> 'Thread Baru berhasil dibuat!']);
    }

    public function threadBaruSiswa(Request $request){
        $threadBaru = new Thread();
        $threadBaru->JudulThread = $request->JudulThread;
        $threadBaru->IsiThread = $request->IsiThread;
        $threadBaru->BerkasThread = $request->BerkasThread;
        $threadBaru->IDPengguna = $request->IDPengguna;
        $threadBaru->IDForum = $request->IDForum;

        $request->IDPengguna = DB::table('Thread')
        ->join('Users', 'Thread.IDPengguna', '=', 'Users.id')
        ->select('Users.*', 'Thread.*')
        ->where('Users.PeranPengguna', '=', 'Siswa')
        ->get();

        $request->IDForum = DB::table('Thread')
        ->join('Forum', 'Forum.id', '=', 'Thread.IDForum')
        ->join('Users', 'Users.id', '=', 'Thread.IDPengguna')
        ->select('Forum.*', 'Thread.*')
        ->get();
        
        $request->validate([
            'BerkasThread' => 'required | mimes:png, jpg, jpeg, doc, docx, xls, xlsx, ppt, pdf, pptx, 
            zip, rar, 7z, gz | max:50000',
            'JudulThread' => 'required | min : 5',
            'IsiThread' => 'required | min : 10'
        ]);

        $namaBerkas = 'Lampiran Thread Siswa-'.time().' pada Thread yang berjudul '.$request->JudulThread.'.'.$request->file('BerkasThread')->extension();  
        $lokasi = $request->file('BerkasThread')->storeAs('uploads/Lampiran-Thread-Siswa/', $namaBerkas);

        $threadBaru->save();

        return redirect()->route('mata_pelajaran.forum-untuk-siswa')->with(['success'=> 'Thread Baru berhasil dibuat!']);
    }

    public function isiThreadGuru(Thread $thread){
        $IDThread = $thread->id;
        $dataThread = Thread::find($IDThread);

        $BalasanUrutTurun = DB::table('BalasanThread')
        ->join('Thread', 'Thread.id',  '=', 'BalasanThread.IDThread')
        ->select('Thread.*', 'BalasanThread.*')
        ->orderBy('BalasanThread.created_at', 'desc')
        ->get();

        $BalasanUrutNaik = DB::table('BalasanThread')
        ->join('Thread', 'Thread.id',  '=', 'BalasanThread.IDThread')
        ->select('Thread.*', 'BalasanThread.*')
        ->orderBy('BalasanThread.created_at', 'asc')
        ->get();

        return view('mata_pelajaran.isi-thread-guru', compact('dataThreadGuru'));
    }

    public function isiThreadSiswa(Thread $thread){
        $IDThreadSiswa = $thread->id;
        $dataThreadSiswa = Thread::find($IDThreadSiswa);

        $BalasanUrutTurun = DB::table('BalasanThread')
        ->join('Thread','Thread.id', '=', 'BalasanThread.IDThread')
        ->select('Thread.*', 'BalasanThread.*')
        ->orderBy('BalasanThread.created_at', 'desc')
        ->get();

        $BalasanUrutNaik = DB::table('BalasanThread')
        ->join('Thread','Thread.id', '=', 'BalasanThread.IDThread')
        ->select('Thread.*', 'BalasanThread.*')
        ->orderBy('BalasanThread.created_at', 'asc')
        ->get();

        return view('mata_pelajaran.isi-thread-siswa', compact('dataThreadSiswa'));
    }

    public function hapusThreadSiswa(Thread $thread){
        $IDThreadSiswa = $thread->id;
        $dataThreadSiswa = Thread::find($IDThreadSiswa);
        $dataThreadSiswa->delete();
        return view('mata_pelajaran.forum-untuk-siswa', compact('dataThreadSiswa'))->with(['success' => 'Thread berhasil dihapus!']);
    }

    public function hapusThreadGuru(Thread $thread){
        $IDThreadGuru = $thread->id;
        $dataThreadGuru = Thread::find($IDThreadGuru);
        $dataThreadGuru->delete();
        return view('mata_pelajaran.forum-untuk-guru', compact('dataThreadGuru'))->with(['success' => 'Thread berhasil dihapus!']);
    }
}