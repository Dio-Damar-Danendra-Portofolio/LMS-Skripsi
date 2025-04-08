<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\MataPelajaran;
use App\Models\Kelas;
use App\Models\Forum;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ThreadSiswaController extends Controller
{
    public function index(Thread $thread) : View {
        $IDThread = $thread->id;
        $dataThread  = Thread::findorFail($IDThread);
        return view('mata_pelajaran.isi-thread-siswa', compact('dataThread'));
    }

    public function threadBaruSiswa(Request $request){
        $thread = new Thread();
        $thread->JudulThread = $request->JudulThread;
        $thread->IsiThread = $request->IsiThread;
        $thread->BerkasThread = $request->BerkasThread;
        $thread->IDPengguna = $request->IDPengguna;
        $thread->IDForum = $request->IDForum;

        $kelas = DB::table('Kelas')
        ->select('NamaKelas')
        ->get();

        $request->IDPengguna = DB::table('Users')
        ->where('PeranPengguna', '=', 'Siswa')
        ->get();

        $request->IDForum = DB::table('Forum')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'Forum.IDMataPelajaran')
        ->join('Kelas', 'Kelas.id', '=', 'MataPelajaran.IDKelas')
        ->join('Users', 'Users.id', '=', 'Kelas.IDPengguna')
        ->select('MataPelajaran.*', 'Forum.*', 'Kelas.*', 'Users.*')
        ->where('Forum.PeruntukanKelas', '=', $kelas)
        ->where('MataPelajaran.PeruntukanKelas', '=', $kelas)
        ->where('MataPelajaran.is_active', '=', 1)
        ->get();

        $request->validate([
            'JudulThread' => 'required | min: 4',
            'IsiThread' => 'required | min : 5',
            'BerkasThread' => 'mimes: png, jpg, jpeg, doc, docx, xls, xlsx, ppt, pdf, pptx, zip, rar, 7z, gz| max:50000'
        ]);

        $namaBerkas = 'Lampiran Thread Siswa '.time().'_'.$request->file('BerkasThread')->getClientOriginalName();
        
        $berkas = $request->file('BerkasThread')->storeAs('uploads/Lampiran-Thread-Siswa/', $namaBerkas);

        $thread->save();

        return redirect()->route('mata_pelajaran.forum-untuk-siswa')->with(['success' => 'Thread baru berhasil dibuat!']);
    }

    public function suntingThreadSiswa(Thread $threadSiswa){
        $IDThreadSiswa = $threadSiswa->id;
        $dataThreadSiswa = Thread::findOrFail($IDThreadSiswa);
        return view('mata_pelajaran.thread-untuk-siswa', compact('dataThreadSiswa'));
    }

    public function revisiThreadSiswa(Request $request, Thread $threadSiswa){
        $request->validate([
            'JudulThread' => 'required | min: 4'->ignore($request->id),
            'IsiThread' => 'required | min : 5'->ignore($request->id),
            'BerkasThread' => 'mimes: png, jpg, jpeg, doc, docx, xls, xlsx, ppt, pdf, pptx, zip, rar, 7z, gz| max:50000'->ignore($request->id)   
        ]);

        $kelas = DB::table('Kelas')
        ->select('NamaKelas')
        ->get();

        $request->IDPengguna = DB::table('Users')
        ->where(Auth::user()->PeranPengguna, '=', 'Siswa')
        ->orWhere('PeranPengguna', '=', 'Siswa')
        ->ignore($request->id)
        ->get();

        $request->IDForum = DB::table('Forum')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'Forum.IDMataPelajaran')
        ->join('Kelas', 'Kelas.id', '=', 'MataPelajaran.IDKelas')
        ->join('Users', 'Users.id', '=', 'Kelas.IDPengguna')
        ->select('MataPelajaran.*', 'Forum.*', 'Kelas.*', 'Users.*')
        ->where('Forum.PeruntukanKelas', '=', $kelas)
        ->where('MataPelajaran.PeruntukanKelas', '=', $kelas)
        ->where('MataPelajaran.is_active', '=', 1)  
        ->ignore($request->id)
        ->get();

        $IDThreadSiswa = $threadSiswa->id;
        $dataThreadSiswa = Thread::findOrFail($IDThreadSiswa);

        if($request->hasFile('BerkasThread')) {
            Thread::delete('uploads/Lampiran-Thread-Siswa', $dataThreadGuru->file('BerkasThread'));

            $namaBerkasThread = 'Lampiran Thread Siswa '.time().'_revisi_'.$request->file('BerkasThread')->getClientOriginalName();
            $berkasThreadSiswa = $request->file('BerkasThread')->storeAs('uploads/Lampiran-Thread-Siswa', $namaBerkasThreadGuru);

            $request->update([
                'JudulThread' => $request->JudulThread,
                'IsiThread' => $request->IsiThread,
                'BerkasThread' => $berkasThreadSiswa,
                'IDForum' => $request->IDForum,
                'IDPengguna' => $request->IDPengguna
            ]);
            return redirect()->route('mata-pelajaran.forum-untuk-siswa')->with(['status'=>'Thread berhasil direvisi!']);
        }
        
        else {
            $request->update([
                'JudulThread' => $request->JudulThread,
                'IsiThread' => $request->IsiThread,
                'IDForum' => $request->IDForum,
                'IDPengguna' => $request->IDPengguna
            ]);
        }
        return redirect()->route('mata-pelajaran.forum-untuk-siswa')->with(['status'=>'Thread berhasil direvisi!']);
    }

    public function hapusThread(Thread $threadSiswa){
        $IDThreadSiswa = $threadSiswa->id;
        $dataThreadSiswa = Thread::find($IDThreadSiswa);
        Thread::delete($dataThreadSiswa);
        $dataThreadSiswa->delete();
        return view('mata-pelajaran.forum-untuk-siswa')->with(['status' => 'Thread berhasil dihapus!']);
    }
}