<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use Illuminate\Support\Facades\DB;
use App\Models\Pesan;
use App\Models\User;
use App\Models\Guru;
use App\Models\Admin;
use App\Models\Siswa;


class ChatController extends Controller
{
    public function __invoke(){

    }
    
    public function index(Chat $obrolan){
        $IDChat = $obrolan->id;
        $dataChat = Chat::find($IDChat);
        return view('siswa.obrolan-siswa', compact('dataChat'));
    }

    public function chatuntukGuru(){
        $pengguna  = DB::table('Users')
        ->select('Users.*')
        ->get();
        
        return view('guru.daftar-pengguna', compact('pengguna'));
    }

    public function chatUntukSiswa(User $pengguna){
        $pengguna  = DB::table('Users')
        ->select('Users.*')
        ->get();

        return view('siswa.daftar-pengguna', ['penggunaChat' => $pengguna]);
    }

    public function chatUntukAdmin(){
        $pengguna  = DB::table('Users')
        ->select('Users.*')
        ->get();

        return view('admin.daftar-pengguna', ['penggunaChat' => $pengguna]);
    }

    public function riwayatPesanAdmin(){
        $chat = DB::join('Pesan', 'Chat.IDPesan', '=', 'Pesan.id')
        ->join('Chat', 'Pesan.IDChat', '=', 'Chat.id')
        ->join('Users', 'Chat.IDPengguna', '=', 'Users.id')
        ->select('Pesan.*', 'Chat.*', 'Users.*');

        return view('admin.riwayat-pesan');
    }

    public function riwayatPesanGuru(){
        $chat = Chat::join('Pesan', 'Chat.IDPesan', '=', 'Pesan.id')
        ->join('Chat', 'Pesan.IDChat', '=', 'Chat.id')
        ->join('Users', 'Chat.IDPengguna', '=', 'Users.id')
        ->select('Pesan.*', 'Chat.*', 'Users.*');

        return view('guru.riwayat-pesan');
    }

    public function riwayatPesanSiswa(){
        $chat = DB::table('Chat')
        ->join('Pesan', 'Chat.IDPesan', '=', 'Pesan.id')
        ->join('Chat', 'Pesan.IDChat', '=', 'Chat.id')
        ->join('Users', 'Chat.IDPengguna', '=', 'Users.id')
        ->select('Pesan.*', 'Chat.*', 'Users.*');

        return view('siswa.riwayat-pesan');
    }

    public function kolomObrolanSiswa(){
        return view('siswa.kolom-obrolan-siswa');
    }

    public function chatBaruSiswa(Request $request){
        $chat = new Chat;
        $chat->WaktuPesanTerakhir = $request->WaktuPesanTerakhir;
        $chat->Terbaca = $request->Terbaca;
        $chat->IDPesan = $request->IDPesan;
        $chat->IDPengguna = $request->IDPengguna;

        $request->WaktuPesanTerakhir = DB::table('Chat')
        ->join('Pesan', 'Pesan.id', '=', 'Chat.IDPesan')
        ->select('Pesan.*', 'Chat.*', DB::raw('MAX(Pesan.created_at) as PesanTerakhir'))
        ->where('Pesan.Terbaca', 'true')
        ->orderBy('Pesan.created_at', 'desc')
        ->get();

        $request->IDPesan = DB::table('Chat')
        ->join('Pesan', 'Pesan.id', '=', 'Chat.IDPesan')
        ->select('Pesan.*', 'Chat.*')
        ->get();

        $request->IDPengguna = DB::table('Chat')
        ->join('Users', 'Users.id', '=', 'Chat.IDPengguna')
        ->select('Users.*')
        ->where('Users.PeranPengguna', '=', 'Siswa')
        ->orWhere(function(Builder $query){
            $query->where('Users.PeranPengguna', '=', 'Guru')
                  ->orWhere(function(Builder $query){
                    $query->where('Users.PeranPengguna', '=', 'Admin');
                  });
        })
        ->get();

        $chat->save();

        return redirect()->route('siswa.kolom-obrolan-siswa');
    }

    public function kolomObrolanGuru(){
        return view('guru.kolom-obrolan-guru');
    }  

    public function chatBaruGuru(Request $request){
        $chat = new Chat;
        $chat->WaktuPesanTerakhir = $request->WaktuPesanTerakhir;
        $chat->Terbaca = $request->Terbaca;
        $chat->IDPesan = $request->IDPesan;
        $chat->IDPengguna = $request->IDPengguna;

        $request->WaktuPesanTerakhir = DB::table('Chat')
        ->join('Pesan', 'Pesan.id', '=', 'Chat.IDPesan')
        ->select('Pesan.*', 'Chat.*', DB::raw('MAX(Pesan.created_at) as PesanTerakhir'))
        ->where('Pesan.Terbaca', 'true')
        ->orderBy('Pesan.created_at', 'desc')
        ->get();

        $request->IDPesan = DB::table('Chat')
        ->join('Pesan', 'Pesan.id', '=', 'Chat.IDPesan')
        ->select('Pesan.*', 'Chat.*')
        ->get();

        $request->IDPengguna = DB::table('Chat')
        ->join('Users', 'Users.id', '=', 'Chat.IDPengguna')
        ->select('Users.*')
        ->where('Users.PeranPengguna', '=', 'Siswa')
        ->orWhere(function(Builder $query){
            $query->where('Users.PeranPengguna', '=', 'Guru')
                  ->orWhere(function(Builder $query){
                    $query->where('Users.PeranPengguna', '=', 'Admin');
                  });
        })
        ->get();

        $chat->save();

        return redirect()->route('guru.kolom-obrolan-guru');
    }

    public function kolomObrolanAdmin(){
        return view('admin.kolom-obrolan-admin');
    }

    public function chatBaruAdmin(Request $request){
        $chat = new Chat;
        $chat->WaktuPesanTerakhir = $request->WaktuPesanTerakhir;
        $chat->Terbaca = $request->Terbaca;
        $chat->IDPesan = $request->IDPesan;
        $chat->IDPengguna = $request->IDPengguna;

        $request->WaktuPesanTerakhir = DB::table('Chat')
        ->join('Pesan', 'Pesan.id', '=', 'Chat.IDPesan')
        ->select('Pesan.*', 'Chat.*', DB::raw('MAX(Pesan.created_at) as PesanTerakhir'))
        ->where('Pesan.Terbaca', 'true')
        ->orderBy('Pesan.created_at', 'desc')
        ->get();

        $request->IDPesan = DB::table('Chat')
        ->join('Pesan', 'Pesan.id', '=', 'Chat.IDPesan')
        ->select('Pesan.*', 'Chat.*')
        ->whereNotNull('Pesan.IsiPesan')
        ->get();

        $request->IDPengguna = DB::table('Chat')
        ->join('Users', 'Chat.IDPengguna', '=', 'Users.id')
        ->select('Users.*', 'Chat.*')
        ->where('Users.PeranPengguna', 'Siswa')
        ->orWhere(function(Builder $query){
            $query->where('Users.PeranPengguna', '=', 'Guru')
                  ->orWhere(function(Builder $query){
                    $query->where('Users.PeranPengguna', '=', 'Admin');
                  });
        })
        ->get();

        $chat->save();

        return redirect()->route('admin.kolom-obrolan-admin');
    }

    public function pesanBaruSiswa(Request $request){
        $pesanBaru = new Pesan();
        $pesanBaru->IDChat = $request->IDChat;
        $pesanBaru->IDPengguna = $request->IDPengguna;
        $pesanBaru->IsiPesan = $request->IsiPesan;
        $pesanBaru->Terkirim = $request->Terkirim;
        $pesanBaru->Terbaca = $request->Terbaca;
        $pesanBaru->BerkasPesan = $request->BerkasPesan;

        $request->IDChat = DB::table('Pesan')
        ->join('Chat','Pesan.IDChat', '=', 'Chat.id')
        ->join('Pesan', 'Chat.IDPesan', '=', 'Pesan.id')
        ->select('Chat.*')
        ->get();

        $request->IDPengguna = DB::table('Pesan')
        ->join('Users','Users.id', '=', 'Pesan.IDPengguna')
        ->select('Users.*')
        ->where('Users.PeranPengguna', 'Siswa')
        ->get();

        $request->validate([
            'BerkasPesan' => 'required | mimes:pdf, xlsx, zip, docx, jpg, png, 
            jpeg, 7z, gz, doc, xls, xlsm, docm, ppt, pptx, pptm | max:50000',
            'IsiPesan' => 'required | min: 10'
        ]);

        $lokasi = $request->file('BerkasPesan')->storeAs('uploads/Lampiran-Pesan-Siswa/', $namaBerkas);
        $namaBerkas = 'Lampiran Pesan Siswa-'.time().'.'.$request->file('BerkasPesan')->extension();
                
        $pesanBaru->save();
        
        return redirect()->route('siswa.kolom-obrolan-siswa');
    }

    public function pesanBaruGuru(Request $request){
        $pesanBaru = new Pesan();
        $pesanBaru->IDChat = $request->IDChat;
        $pesanBaru->IDPengguna = $request->IDPengguna;
        $pesanBaru->IsiPesan = $request->IsiPesan;
        $pesanBaru->Terkirim = $request->Terkirim;
        $pesanBaru->Terbaca = $request->Terbaca;
        $pesanBaru->BerkasPesan = $request->BerkasPesan;

        $request->IDChat = DB::table('Pesan')
        ->join('Chat','Pesan.IDChat', '=', 'Chat.id')
        ->join('Pesan', 'Chat.IDPesan', '=', 'Pesan.id')
        ->select('Chat.*')
        ->get();

        $request->IDPengguna = DB::table('Pesan')
        ->join('Users','Users.id', '=', 'Pesan.IDPengguna')
        ->select('Users.*')
        ->where('Users.PeranPengguna', 'Guru')
        ->get();

        $request->validate([
            'BerkasPesan' => 'required | mimes:pdf, xlsx, zip, docx, jpg, 
            png, jpeg, 7z, gz, doc, xls, docm | max:50000',
            'IsiPesan' => 'required | min: 10'
        ]);

        $lokasi = $request->file('BerkasPesan')->storeAs('uploads/Lampiran-Pesan-Guru/', $namaBerkas);
        $namaBerkas = 'Lampiran Pesan Guru-'.time().'.'.$request->file('BerkasPesan')->extension();
        
        $pesanBaru->save();
        
        return redirect->route('guru.kolom-obrolan-guru');
    }

    public function pesanBaruAdmin(Request $request){
        $pesanBaru = new Pesan();
        $pesanBaru->IDChat = $request->IDChat;
        $pesanBaru->IDPengguna = $request->IDPengguna;
        $pesanBaru->IsiPesan = $request->IsiPesan;
        $pesanBaru->Terkirim = $request->Terkirim;
        $pesanBaru->Terbaca = $request->Terbaca;
        $pesanBaru->BerkasPesan = $request->BerkasPesan;

        $request->IDChat = DB::table('Pesan')
        ->join('Chat','Pesan.IDChat', '=', 'Chat.id')
        ->join('Pesan', 'Chat.IDPesan', '=', 'Pesan.id')
        ->select('Chat.*')
        ->get();

        $request->IDPengguna = DB::table('Pesan')
        ->join('Users', 'Users.id', '=', 'Pesan.ID')
        ->select('Users.*')
        ->where('Users.PeranPengguna', '=', 'Admin')
        ->limit(1)
        ->get();    

        $request->validate([
            'BerkasPesan' => 'required | mimes: png, jpg, jpeg, doc, docx, 
            xls, xlsx, ppt, pdf, pptx, zip, rar, 7z, gz | max:50000', 
            'IsiPesan' => 'required | min: 10'
        ]);

        $namaBerkas = 'Lampiran Pesan Admin '.time().'.'.$request->file('BerkasPesan')->extension();
        $lokasi = $request->file('BerkasPesan')->storeAs('uploads/Lampiran-Pesan-Admin/', $namaBerkas);

        $pesanBaru->save();
        
        return redirect->route('admin.kolom-obrolan-admin');
    }

    public function hapusChatAdmin(Chat $obrolan){
        $IDChat = $obrolan->id;
        $isiChat = Chat::findOrFail($IDChat);
        Chat::delete($isiChat);
        $isiChat->delete();
        return view('admin.kolom-obrolan-admin')->with(['success' => 'Chat Admin berhasil dihapus!']);
    }

    public function hapusChatGuru(Chat $obrolan){
        $IDChat = $obrolan->id;
        $isiChat = Chat::findOrFail($IDChat);
        Chat::delete($isiChat);
        $isiChat->delete();
        return view('guru.kolom-obrolan-guru')->with(['success' => 'Chat Guru berhasil dihapus!']);
    }

    public function hapusChatSiswa(Chat $obrolan){
        $IDChat = $obrolan->id; 
        $isiChat = Chat::findOrFail($IDChat);
        Chat::delete($isiChat);
        $isiChat->delete();
        return view('siswa.kolom-obrolan-siswa')->with(['success' => 'Chat Siswa berhasil dihapus!']);
    }
}