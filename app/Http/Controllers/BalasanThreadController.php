<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\BalasanThread;
use App\Models\Thread;
use App\Models\Forum;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class BalasanThreadController extends Controller
{
    public function index(){
        $balasanSiswa = DB::table('BalasanThread')
            ->join('Thread', 'Thread.id', '=', 'BalasanThread.IDThread')
            ->join('Forum', 'Forum.id',  '=', 'Thread.IDForum')
            ->join('Kelas', 'Kelas.id', '=', 'Forum.IDKelas')
            ->join('Users', 'Users.id', '=', 'Kelas.IDPengguna')
            ->select('Users.*', 'Kelas.*', 'Forum.*', 'ThreadGuru.*', 'BalasanThread.*')
            ->where('Users.PeranPengguna', 'Siswa')
            ->get();

        $isiThread = DB::table('Thread')
        ->join('Forum', 'Forum.id', '=', 'Thread.IDForum')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'Forum.IDMataPelajaran')
        ->join('Users', 'Users.id', '=', 'MataPelajaran.IDPengguna',)
        ->join('Users', 'Users.id', '=', 'Thread.IDPengguna')
        ->select('Thread.*', 'Users.*', 'Forum.*', 'MataPelajaran.*')
        ->whereNotNull('Thread.IDPengguna')
        ->whereNotNull('Thread.IDForum')
        ->where([
            ['Users.PeranPengguna', '=', 'Guru']
        ])
        ->orWhere(function (Builder $query){
            $query->where(Auth::user()->PeranPengguna, '=', 'Guru');
        })
        ->limit(1)
        ->get();
        return view('mata_pelajaran.isi-thread-siswa');
    }

    public function balas(Request $request){
        $balasan = new BalasanThread();
        $balasan->IsiBalasan = $request->IsiBalasan;
        $balasan->BerkasBalasan = $request->BerkasBalasan;
        $balasan->IDThread = $request->IDThread;
        $balasan->IDPengguna = $request->IDPengguna;

        $kelas = DB::table('Kelas')
        ->select('Kelas.NamaKelas')
        ->get();
        
        $request->IDThreadGuru = DB::table('BalasanThread')
        ->join('ThreadGuru', 'BalasanThread.IDThreadGuru', '=', 'ThreadGuru.id')
        ->join('Forum', 'ThreadGuru.IDForum', '=',  'Forum.id')
        ->join('Kelas', 'Forum.IDKelas', '=', 'Kelas.id')
        ->join('MataPelajaran', 'Forum.IDMataPelajaran', '=', 'MataPelajaran.id')
        ->join('Users', 'BalasanThread.IDPengguna', '=', 'Users.id')
        ->select('Thread.*', 'Users.*', 'BalasanThread.*', 'Forum.*', 'Kelas.*', 'MataPelajaran.*')
        ->where([
            ['Users.PeranPengguna', 'Siswa'],
            ['Users.KelasSiswa', $kelas]
        ])
        ->whereNotNull('BalasanThread.IsiBalasan')
        ->whereNotNull('BalasanThread.IDThread')
        ->get();

        $request->IDPengguna = DB::table('BalasanThread')
        ->join('Thread', 'BalasanThread.IDThread', '=', 'Thread.id',)
        ->join('Forum', 'ThreadGuru.IDForum', '=', 'Forum.id')
        ->join('Kelas', 'Forum.IDKelas', '=', 'Kelas.id')
        ->join('MataPelajaran', 'Forum.IDMataPelajaran', '=', 'MataPelajaran.id',)
        ->join('Users', 'BalasanThread.IDPengguna', '=', 'Users.id')
        ->select('Users.*', 'BalasanThread.*', 'ThreadGuru.*', 'Forum.*',
        'Kelas.*', 'MataPelajaran.*')
        ->where('Users.PeranPengguna', 'Siswa')
        ->where('Users.KelasSiswa', $kelas)
        ->limit(1)
        ->get();
        
        $request->validate([
            'BerkasBalasan' => 'required | mimes: png, jpg, jpeg, doc, docm, docx, xls, xlsm, 
            xlsx, ppt, pdf, pptx, zip, rar, 7z, gz| max:50000',
            'IsiBalasan' => 'required | min : 20'
        ]);
        
        $lokasi = $request->file('BerkasBalasan')->storeAs('uploads/Balasan-Thread/', $namaBerkasBalasanThread);
        
        $namaBerkasBalasanThread = 'Balasan Thread '.time().'.'.$request->file('BerkasBalasan')->extension();

        $balasan->save();

        return redirect()->route('mata_pelajaran.isi-thread-siswa')->with(['success' => 'Thread Berhasil Dibalas!']);
    }

    public function revisiBalasanThread(BalasanThread $balasanThread){
        $IDBalasanThread = $balasanThread->id;
        $dataBalasanThread = BalasanThread::findOrFail($IDBalasanThread);
        return view('mata_pelajaran.isi-thread-siswa', compact('dataBalasanThread'));
    }

    public function suntingBalasanThread(Request $request, BalasanThread $balasanThread){
        $kelas = DB::table('Kelas')
        ->select('Kelas.NamaKelas')
        ->get();

        $request->IDThread = DB::table('BalasanThread')
        ->join('Thread', 'BalasanThread.IDThread', '=', 'Thread.id')
        ->join('Forum', 'Thread.IDForum', '=',  'Forum.id')
        ->join('Kelas', 'Forum.IDKelas', '=', 'Kelas.id')
        ->join('MataPelajaran', 'Forum.IDMataPelajaran', '=', 'MataPelajaran.id')
        ->join('Users', 'BalasanThread.IDPengguna', '=', 'Users.id')
        ->select('Thread.*', 'Users.*', 
        'BalasanThread.*', 'Forum.*', 'Kelas.*', 'MataPelajaran.*')
        ->where([
            ['Users.PeranPengguna', 'Siswa'],
            ['Users.KelasSiswa', $kelas]
        ])
        ->whereNotNull('BalasanThread.IsiBalasan')
        ->whereNotNull('BalasanThread.IDThread')
        ->get();


        $request->IDSiswa = DB::table('BalasanThread')
        ->join('Thread', 'BalasanThread.IDThread', '=', 'Thread.id',)
        ->join('Forum', 'Thread.IDForum', '=', 'Forum.id')
        ->join('Kelas', 'Forum.IDKelas', '=', 'Kelas.id')
        ->join('MataPelajaran', 'Forum.IDMataPelajaran', '=', 'MataPelajaran.id',)
        ->join('Users', 'BalasanThread.IDPengguna', '=', 'Users.id',)
        ->select('Users.*', 'BalasanThread.*', 'Thread.*', 'Forum.*',
        'Kelas.*', 'MataPelajaran.*')
        ->where('Users.PeranPengguna', 'Siswa')
        ->where('Users.KelasSiswa', $kelas)
        ->limit(1)
        ->get();

        $request->validate([
            'BerkasBalasan' => 'required | mimes: png, jpg, jpeg, doc, docm, docx, xls, xlsm, 
            xlsx, ppt, pdf, pptx, zip, rar, 7z, gz| max:50000',
            'IsiBalasan' => 'required | min : 20'
        ]);

        $IDBalasanThread = $balasanThread->id;
        $dataBalasanThread = BalasanThread::findOrFail($IDBalasanThread);

        if ($request->hasFile('BerkasBalasan')){

            $request->file('BerkasBalasan')->delete();

            $namaBerkasBalasanThread = 'Balasan Thread '.time().'-revisi.'.$request->file('BerkasBalasan')->extension();
            $lokasi = $request->file('BerkasBalasan')->storeAs('uploads/Balasan-Thread/', $namaBerkasBalasanThread);

            $request->where('id', '<>', $request->id)->update([
                'BerkasBalasan' => $request->BerkasBalasan,
                'IsiBalasan' => $request->IsiBalasan,
                'IDThreadGuru' => $request->IDThreadGuru,
                'IDSiswa' => $request->IDSiswa
            ]);
        }

        else {
            $request->where('id', '<>', $request->id)->update([
                'IsiBalasan' => $request->IsiBalasan,
                'IDThreadGuru' => $request->IDThreadGuru,
                'IDSiswa' => $request->IDSiswa
            ]);
        }

        $balasan->save();

        return redirect()->route('mata_pelajaran.isi-thread-siswa')->with(['success' => 'Balasan Thread berhasil direvisi!']);
    }

    public function hapusBalasanThread(BalasanThread $balasan){
        $IDBalasanThread = $balasan->id;
        $dataBalasanThread = BalasanThread::findOrFail($IDBalasanThread);
        $dataBalasanThread->delete();
        return view('mata_pelajaran.isi-thread-siswa')->with(['success' => 'Balasan Thread berhasil dihapus!']);
    }
}