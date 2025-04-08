<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Guru;
use App\Models\User;
use App\Models\Forum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ThreadGuruController extends Controller
{
    public function index(Thread $threadguru, BalasanThread $balasan){
        $IDThread = $threadguru->id;
        $dataThread = Thread::find($IDThread);

        $balasan = DB::table('BalasanThread')
        ->join('Thread', 'Thread.id', '=', 'BalasanThread.IDThread')
        ->join('Users', 'Users.id', '=', 'Thread.IDPengguna')
        ->join('Forum', 'Forum.id', '=', 'Thread.IDForum')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'Forum.IDMataPelajaran')
        ->join('Kelas', 'Kelas.id', '=', 'MataPelajaran.IDKelas')
        ->join('Users', 'Users.id', '=', 'Kelas.IDPengguna')
        ->select('BalasanThread.*', 'Users.*', 'Forum.*', 'Thread.*', 'Kelas.*')
        ->where('Users.PeranPengguna', '=', 'Siswa')
        ->get();
        return view('mata_pelajaran.isi-thread-siswa', compact('dataThreadGuru'));
    }

    public function threadBaruGuru(Request $request){
        $thread =  new Thread();
        $thread->JudulThread = $request->JudulThread;
        $thread->IsiThread = $request->IsiThreadGuru;
        $thread->BerkasThread = $request->BerkasThreadGuru;
        $thread->IDPengguna = $request->IDPengguna;
        $thread->IDForum = $request->IDForum;

        $namaKelas = DB::table('Kelas')
        ->select('NamaKelas')
        ->get();

        $request->IDPengguna = DB::table('Thread')
        ->join('Forum', 'Forum.id', '=', 'Thread.IDForum')
        ->join('Users', 'Users.id', '=', 'Forum.IDPengguna')
        ->select('Users.*', 'Forum.*')
        ->where('Users.PeranPengguna', '=', 'Guru')
        ->orWhere(Auth::user()->PeranPengguna, '=', 'Guru')
        ->get();

        $mapel = DB::table('Users')
        ->select('MataPelajaran', DB::raw('CONCAT(NamaPertamaPengguna, NamaTerakhirPengguna) as NamaLengkapGuru'))
        ->where('PeranPengguna', '=', 'Guru')
        ->get();

        $mapel2 = DB::table('Users')
        ->select('MataPelajaran2', DB::raw('CONCAT(NamaPertamaPengguna, NamaTerakhirPengguna) as NamaLengkapGuru'))
        ->where('PeranPengguna', '=', 'Guru')
        ->get();
        
        $mapel3 = DB::table('Users')
        ->select('MataPelajaran3', DB::raw('CONCAT(NamaPertamaPengguna, NamaTerakhirPengguna) as NamaLengkapGuru'))
        ->where('PeranPengguna', '=', 'Guru')
        ->get();

        $mapel4 = DB::table('Users')
        ->select('MataPelajaran4', DB::raw('CONCAT(NamaPertamaPengguna, NamaTerakhirPengguna) as NamaLengkapGuru'))
        ->where('PeranPengguna', '=', 'Guru')
        ->get();

        $request->IDForum= DB::table('Thread')
        ->join('Forum', 'Forum.id', '=', 'Thread.IDForum')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'Forum.IDMataPelajaran')
        ->join('Kelas', 'Kelas.id', '=', 'Forum.IDKelas')
        ->join('Users', 'Users.id', '=', 'Kelas.IDPengguna')
        ->select('Forum.*', 'Thread.*', 'Kelas.*', 'MataPelajaran.*')
        ->where(function(Builder $query){
                $query->where([
                    ['Forum.PeruntukanKelas', '=', $namaKelas],
                    ['MataPelajaran.PeruntukanKelas', '=', $namaKelas],
                    ['MataPelajaran.NamaMataPelajaran', '=', $mapel]
                ]);
            })
        ->orWhere(function(Builder $query){
            $query->where([
            ['Forum.PeruntukanKelas', '=', $namaKelas],
            ['MataPelajaran.PeruntukanKelas', '=', $namaKelas],
            ['MataPelajaran.NamaMataPelajaran', '=', $mapel2]
            ]);
        })
        ->orWhere(function(Builder $query){
            $query->where([
                ['Forum.PeruntukanKelas', '=', $namaKelas],
                ['MataPelajaran.PeruntukanKelas', '=', $namaKelas],
                ['MataPelajaran.NamaMataPelajaran', '=', $mapel3]
            ]);
        })
        ->orWhere(function(Builder $query){
            $query->where([
                ['Forum.PeruntukanKelas', '=', $namaKelas],
                ['MataPelajaran.PeruntukanKelas', '=', $namaKelas],
                ['MataPelajaran.NamaMataPelajaran', '=', $mapel4]
            ]);
        })
        ->get();

        $request->validate([
            'BerkasThread' => 'mimes: png, jpg, jpeg, doc, docx, xls, xlsx, ppt, pdf, pptx, zip, rar, 7z, gz| max:50000',
            'JudulThread' => 'required| min: 2 |max: 255',
            'IsiThread' => 'required| min: 2 |max: 1000'
        ]);

        $namaBerkas = 'Lampiran Thread Guru '.time().'_'.$request->file('BerkasThread')->getClientOriginalName();

        $request->BerkasThread->storeAs('uploads/Lampiran-Thread-Guru', $namaBerkas);

        $thread->save();

        return redirect()->route('mata_pelajaran.thread-baru-guru')->with(['success'=>'Thread Guru telah dibuat!']);
    }

    public function revisiThreadGuru(Thread $threadGuru){
        $IDThreadGuru = $threadGuru->id;
        $dataThreadGuru = Thread::findOrFail($IDThreadGuru);
        return view('mata_pelajaran.thread-guru', compact('dataThreadGuru'));
    }

    public function suntingThreadGuru(Request $request, Thread $threadGuru){
        $this->validate($request, [
            'BerkasThread' => 'mimes: png, jpg, jpeg, doc, docm, docx, xls, xlsx, 
            ppt, pptm, pdf, pptx, zip, rar, 7z, gz| max:50000',
            'JudulThread' => 'required| min: 2 |max: 255',
            'IsiThread' => 'required| min: 2 |max: 1000'
        ]);

        $namaKelas = DB::table('Kelas')
        ->select('NamaKelas')
        ->get();

        $request->IDPengguna = DB::table('Thread')
        ->join('Forum', 'Forum.id', '=', 'Thread.IDForum')
        ->join('Users', 'Users.id', '=', 'Forum.IDPengguna')
        ->select('Users.*', 'Forum.*')
        ->where('Users.PeranPengguna', '=', 'Guru')
        ->orWhere(Auth::user()->PeranPengguna, '=', 'Guru')
        ->get();

        $mapel = DB::table('Users')
        ->select('MataPelajaran', DB::raw('CONCAT(NamaPertamaPengguna, NamaTerakhirPengguna) as NamaLengkapGuru'))
        ->where('PeranPengguna', '=', 'Guru')
        ->get();

        $mapel2 = DB::table('Users')
        ->select('MataPelajaran2', DB::raw('CONCAT(NamaPertamaPengguna, NamaTerakhirPengguna) as NamaLengkapGuru'))
        ->where('PeranPengguna', '=', 'Guru')
        ->get();
        
        $mapel3 = DB::table('Users')
        ->select('MataPelajaran3', DB::raw('CONCAT(NamaPertamaPengguna, NamaTerakhirPengguna) as NamaLengkapGuru'))
        ->where('PeranPengguna', '=', 'Guru')
        ->get();

        $mapel4 = DB::table('Users')
        ->select('MataPelajaran4', DB::raw('CONCAT(NamaPertamaPengguna, NamaTerakhirPengguna) as NamaLengkapGuru'))
        ->where('PeranPengguna', '=', 'Guru')
        ->get();

        $request->IDForum= DB::table('Thread')
        ->join('Forum', 'Forum.id', '=', 'Thread.IDForum')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'Forum.IDMataPelajaran')
        ->join('Kelas', 'Kelas.id', '=', 'Forum.IDKelas')
        ->join('Users', 'Users.id', '=', 'Kelas.IDPengguna')
        ->select('Forum.*', 'Thread.*', 'Kelas.*', 'MataPelajaran.*')
        ->where(function(Builder $query){
                $query->where([
                    ['Forum.PeruntukanKelas', '=', $namaKelas],
                    ['MataPelajaran.PeruntukanKelas', '=', $namaKelas],
                    ['MataPelajaran.NamaMataPelajaran', '=', $mapel]
                ]);
            })
        ->orWhere(function(Builder $query){
            $query->where([
            ['Forum.PeruntukanKelas', '=', $namaKelas],
            ['MataPelajaran.PeruntukanKelas', '=', $namaKelas],
            ['MataPelajaran.NamaMataPelajaran', '=', $mapel2]
            ]);
        })
        ->orWhere(function(Builder $query){
            $query->where([
                ['Forum.PeruntukanKelas', '=', $namaKelas],
                ['MataPelajaran.PeruntukanKelas', '=', $namaKelas],
                ['MataPelajaran.NamaMataPelajaran', '=', $mapel3]
            ]);
        })
        ->orWhere(function(Builder $query){
            $query->where([
                ['Forum.PeruntukanKelas', '=', $namaKelas],
                ['MataPelajaran.PeruntukanKelas', '=', $namaKelas],
                ['MataPelajaran.NamaMataPelajaran', '=', $mapel4]
            ]);
        })
        ->get();

        $IDThreadGuru = $threadGuru->id;
        $dataThreadGuru = Thread::findOrFail($IDThreadGuru);

        if ($request->hasFile('BerkasThread')) {     
            Storage::delete('uploads/Lampiran-Thread-Guru', $dataThreadGuru->file('BerkasThread'));

            $namaBerkasThreadGuru = 'Lampiran Thread Guru '.time().'_revisi_'.$request->file('BerkasThread')->getClientOriginalName();
            $berkasThreadGuru = $request->BerkasThread->storeAs('uploads/Lampiran-Thread-Guru', $namaBerkasThreadGuru);

            $dataThreadGuru->update([
                'BerkasThread'=> $berkasThreadGuru,
                'JudulThread' => $request->JudulThread,
                'IsiThread' => $request->IsiThread,
                'IDForum' => $request->IDForum,
                'IDPengguna' => $request->IDPengguna
            ]);

            return redirect()->route('mata_pelajaran.thread-baru-guru', ['dataThreadGuru' => $dataThreadGuru])->with(['status'=>'Thread Guru berhasil diperbarui!']);
        }
        
        else {
            $dataThreadGuru->update([
                'JudulThread' => $request->JudulThread,
                'IsiThread' => $request->IsiThread,
                'IDForum' => $request->IDForum,
                'IDPengguna' => $request->IDPengguna   
            ]);

            return redirect()->route('mata_pelajaran.thread-baru-guru', ['dataThreadGuru' => $dataThreadGuru])->with(['status'=>'Thread Guru berhasil diperbarui!']);
        }
        return view('mata_pelajaran.forum-untuk-guru', ['dataThreadGuru' => $dataThreadGuru]);
    }

    public function hapusThreadGuru(Thread $threadGuru){
        $IDThreadGuru = $threadGuru->id;
        $dataThreadGuru = Thread::findOrFail($IDThreadGuru);
        Thread::delete($dataThreadGuru);
        $dataThreadSiswa->delete();
        return view('mata_pelajaran.forum-untuk-guru', compact('dataThreadGuru'))->with(['status' => 'Thread Guru berhasil dihapus!']);
    }
}