<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;
use App\Models\Chat;
use App\Models\User;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Ujian;
use Illuminate\Support\Facades\DB;

class PesanController extends Controller
{
    public function index(){
        return view('siswa.kolom-chat');
    }

    public function pesanBaruDariGuru(Request $request){
        $pesan = new Pesan();
        $pesan->IsiPesan = $request->IsiPesan;
        $pesan->BerkasPesan = $request->BerkasPesan;
        $pesan->Terbaca = $request->Terbaca;
        $pesan->Terkirim = $request->Terkirim;
        $pesan->IDChat = $request->IDChat;
        $pesan->IDPengguna = $request->IDPengguna;

        $request->IDChat = DB::table('Pesan')
        ->join('Chat', 'Chat.id', '=', 'Pesan.IDChat')
        ->select('Chat.*', 'Pesan.*')
        ->get();

        $request->IDPengguna = DB::table('Pesan')
        ->join('Users', 'Users.id', '=', 'Pesan.IDPengguna')
        ->where(function(Builder $query){
            $query->where('Users.PeranPengguna', '=', 'Guru')
            ->where('Users.is_active', '=', 1);
        })
        ->orWhere(function(Builder $query){
            $query->where(Auth::user()->PeranPengguna, '=', 'Guru')
            ->where(Auth::user()->is_active, '=', 1);
        })
        ->select('Pesan.*', 'Users.*')
        ->get();

        $request->validate([
            'IsiPesan' => 'required',
            'BerkasPesan' => 'mimes: pdf, docx, xlsx, jpg, png, zip, 
            rar, gz, jpeg, doc, docm, xls, xlsm, 7z, ppt, pptx, pptm | max:50000'
        ]);

        $lokasi = $request->file('BerkasPesan')->storeAs('uploads/Lampiran-Pesan-Guru/', $namaBerkas);
        $namaBerkas = 'Lampiran Pesan Guru '.time().'.'.$request->file('BerkasPesan')->extension();
        
        $pesan->save();

        return redirect()->route('guru.kolom-obrolan-guru');
    }

    public function pesanBaruGuru(Request $request){
        $pesanBaru = [
            "IsiPesan" => $request->IsiPesan,
            "BerkasPesan" => $request->BerkasPesan,
            "Terbaca" => $request->Terbaca,
            "Terkirim" => $request->Terkirim,
            "IDChat" => $request->IDChat,
            "IDPengguna" => $request->IDPengguna
        ];

        if ($pesanBaru->Terbaca == 1 AND $pesanBaru->Terkirim == 1) {
            return redirect()->route('guru.kolom-obrolan-guru')->with(['success'=>'Pesan Baru berhasil dikirim!s']);
        }        
        else {
            return redirect()->route('guru.kolom-obrolan-guru');
        }
    }

    public function pesanBaruDariSiswa(Request $request){
        $pesan = new Pesan();
        $pesan->IsiPesan = $request->IsiPesan;
        $pesan->BerkasPesan = $request->BerkasPesan;
        $pesan->Terbaca = $request->Terbaca;
        $pesan->Terkirim = $request->Terkirim;
        $pesan->IDChat = $request->IDChat;
        $pesan->IDPengguna = $request->IDPengguna;

        $request->IDChat = DB::table('Pesan')
        ->join('Chat', 'Chat.id', '=', 'Pesan.IDChat')
        ->select('Chat.*', 'Pesan.*')
        ->get();

        $request->IDPengguna = DB::table('Pesan')
        ->join('Users', 'Users.id', '=', 'Pesan.IDPengguna')
        ->where(function(Builder $query){
            $query->where('Users.PeranPengguna', '=', 'Siswa')
            ->where('Users.is_active', '=', 1);

        })
        ->orWhere(function(Builder $query){
                $query->where(Auth::user()->PeranPengguna, '=', 'Siswa')
                ->where(Auth::user()->is_active, '=', 1);
        })
        ->get();

        $request->validate([
            'IsiPesan' => 'required',
            'BerkasPesan' => 'mimes: pdf, docx, xlsx, jpg, png, zip, 
            rar, gz, jpeg, doc, docm, xls, xlsm, 7z, ppt, pptx, pptm | max:50000'
        ]);
        
        $lokasi = $request->file('BerkasPesan')->storeAs('uploads/Lampiran-Pesan-Siswa/', $namaBerkas);
        $namaBerkas = 'Lampiran Pesan Siswa '.time().'.'.$request->file('BerkasPesan')->extension();

        $pesan->save();

        return redirect()->route('siswa.kolom-obrolan-siswa');
    }

    public function pesanBaruSiswa(Request $request){
        $pesanBaru = [
            "IsiPesan" => $request->IsiPesan,
            "BerkasPesan" => $request->BerkasPesan,
            "Terbaca" => $request->Terbaca,
            "Terkirim" => $request->Terkirim,
            "IDChat" => $request->IDChat,
            "IDPengguna" => $request->IDPengguna    
        ];

        if ($pesanBaru->Terbaca == 1 AND $pesanBaru->Terkirim == 1) {
            return redirect()->route('siswa.kolom-obrolan-siswa')->with(['success'=>'Pesan Baru berhasil dikirim!s']);
        }        
        else {
            return redirect()->route('siswa.kolom-obrolan-siswa');
        }
    }

    public function pesanBaruDariAdmin(Request $request){
        $pesan = new Pesan();
        $pesan->IsiPesan = $request->IsiPesan;
        $pesan->BerkasPesan = $request->BerkasPesan;
        $pesan->Terbaca = $request->Terbaca;
        $pesan->Terkirim = $request->Terkirim;
        $pesan->IDChat = $request->IDChat;
        $pesan->IDPengguna = $request->IDPengguna;

        $request->IDChat = DB::table('Pesan')
        ->join('Chat', 'Pesan.IDChat', '=', 'Chat.id')
        ->get('Chat.*', 'Pesan.*');

        $request->IDPengguna = DB::table('Pesan')
        ->join('Users', 'Pesan.IDPengguna', '=', 'Users.id')
        ->where('Users.PeranPengguna', 'Admin');


        $request->validate([
            'IsiPesan' => 'min: 0',
            'BerkasPesan' => 'mimes: pdf, docx, xlsx, jpg, png, zip, 
            rar, gz, jpeg, doc, docm, xls, xlsm, 7z, ppt, pptx, pptm | max:50000'
        ]);
        
        $lokasi = $request->file('BerkasPesan')->storeAs('uploads/Lampiran-Pesan-Admin/', $namaBerkas);
        $namaBerkas = 'Lampiran Pesan Admin '.time().'.'.$request->file('BerkasPesan')->extension();
        
        $pesan->save();

        return redirect()->route('admin.kolom-obrolan-admin');
    }
    
    public function pesanBaruAdmin(Request $request){
        $pesanBaru = [
            "IsiPesan" => $request->IsiPesan,
            "BerkasPesan" => $request->BerkasPesan,
            "Terbaca" => $request->Terbaca,
            "Terkirim" => $request->Terkirim,
            "IDChat" => $request->IDChat,
            "IDPengguna" => $request->IDPengguna    
        ];

        if ($pesanBaru->Terbaca == 1 AND $pesanBaru->Terkirim == 1) {
            return redirect()->route('admin.kolom-obrolan-admin')->with(['success'=>'Pesan Baru berhasil dikirim!s']);
        }        
        else {
            return redirect()->route('admin.kolom-obrolan-admin');
        }
    }

    public function hapusPesanAdmin(Pesan $pesan){
        $IDPesan = $pesan->id;
        $dataPesan = Pesan::findOrFail($IDPesan);
        $dataPesan->delete();
        return view('admin.kolom-obrolan-admin', compact('dataPesan'))->with(['success'=>'Pesan berhasil dihapus!']);
    }

    public function hapusPesanGuru(Pesan $pesan){
        $IDPesan = $pesan->id;
        $dataPesan = Pesan::findOrFail($IDPesan);
        $dataPesan->delete();
        return view('guru.kolom-obrolan-guru', compact('dataPesan'))->with(['success'=>'Pesan berhasil dihapus!']);
    }

    public function hapusPesanSiswa(Pesan $pesan){
        $IDPesan = $pesan->id;
        $dataPesan = Pesan::findOrFail($IDPesan);
        $dataPesan->delete();
        return view('siswa.kolom-obrolan-siswa', compact('dataPesan'))->with(['success'=>'Pesan berhasil dihapus!']);
    }
}