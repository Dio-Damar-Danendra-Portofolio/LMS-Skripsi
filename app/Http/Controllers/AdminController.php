<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin;
use App\Models\User;
use App\Models\Pengguna;
use App\Models\Pengumuman;
use App\Models\Pembayaran;
use App\Models\MataPelajaran;
use App\Models\Kelas;
use App\Models\Ujian;
use Illuminate\Support\Facades\DB;
use Session;

class AdminController extends Controller
{
    public function __invoke(){

    }

    public function index(){
        return view('dashboard');
    }

    public function lihatPengumuman(Pengumuman $pengumuman){
        $IDPengumuman = $pengumuman->id;
        $dataPengumuman = Pengumuman::find($IDPengumuman);
        return view('admin.lihat-pengumuman', compact('dataPengumuman'));
    }

    public function lihatMapel(){
        return view('admin.lihat-mata-pelajaran');
    }

    public function inputPengumuman(){
        return view('admin.tambah-pengumuman');
    }

    public function editPengumuman(){
        return view('admin.edit-pengumuman');
    }

    public function biodataAdmin(){
        return view('admin.profil-admin');
    }

    public function obrolanAdmin(){
        return view('admin.obrolan-admin');
    }

    public function pengumuman(){
        return view('admin.pengelola-pengumuman');
    }

    public function pembayaran(){
        return view('admin.pengelola-pembayaran');
    }

    public function inputPembayaran(){
        return view('admin.tambah-pembayaran');
    }

    public function lihatPembayaran(Pembayaran $pembayaran)
    {
        $IDPembayaran = $pembayaran->id;
        $dataPembayaran = Pembayaran::find($IDPembayaran);
        return view('pembayaran.lihat-pembayaran', compact('dataPembayaran'));
    }

    public function jadwalKelas(){
        $jadwal = DB::table('JadwalKelas')
        ->select('*')
        ->get();

        $kelas = DB::table('Kelas')
        ->select('*')
        ->get();

        return view('admin.pengelola-jadwal-kelas', compact('jadwal', 'kelas'));
    }

    public function tambahMapel(){
        return view('admin.tambah-mata-pelajaran');
    }

    public function pengelolaUjian(){
        $ujian = DB::table('Ujian')
        ->select('*')->first();

        $kelas = DB::table('Kelas')
        ->select('*')
        ->get();

        $semester = DB::table('Users')
        ->select('Semester')
        ->get();

        return view('admin.pengelola-ujian', compact('ujian', 'kelas'));
    }

    public function inputUjian(){
        return view('admin.tambah-ujian');
    }

    public function suntingProfilAdmin(){
        return view('admin.sunting-profil-admin');
    }

    public function gantiKataSandi(){
        return view('admin.ganti-kata-sandi');
    }

    public function perbaruiProfilAdmin(Request $request, $pengguna){

        // $request->validate([
        //     'NamaPertamaPengguna',
        //     'NamaTerakhirPengguna',
        //     'NomorIndukPengguna',
        //     'PeranPengguna',
        //     'SurelPengguna',
        //     'NomorPonselPengguna',
        //     'TanggalLahirPengguna',
        //     'TahunMasukPengguna',
        //     'DivisiAdmin' => 'min: 5',
        //     'FotoProfilPengguna' => 'mimes: jpg, jpeg, png | max: 50000'
        // ]);

        // $pengguna = Auth::user()->id
        // ->where('PeranPengguna', '=', 'Admin')
        // ->where('is_active', '=', 1);

        // $admin = Admin::findOrFail($pengguna);

        // $namaBerkas= 'Foto Profil Admin '.$request->DivisiAdmin.'-'.$request->NomorIndukPengguna.'-'.$request->NamaPertamaPengguna.' '.$request->NamaTerakhirPengguna.' pada tanggal '.time().'.'.$request->file->extension();

        // if ($request->hasFile('FotoProfilPengguna')) {
        //     $fotoprofil = $request->file('FotoProfilPengguna');
        //     $fotoprofil->storeAs('uploads/Foto-Profil-Admin', $namaBerkas);

        //     $admin->update([
        //         'FotoProfilPengguna' => $request->FotoProfilPengguna,
        //         'DivisiAdmin' => $request->DivisiAdmin
        //     ]);
        // }
        // else{
        //     $admin->update([
        //         'DivisiAdmin' => $request->DivisiAdmin
        //     ]);
        // }

        return redirect()->route('admin.sunting-profil-admin')->with(['success' => 'Data Admin Berhasil Diubah!']);
    }

    public function pengelolaKelas(){
        $kelas = DB::table('Kelas')->select('*')->get();
        return view('admin.pengelola-kelas', compact('kelas'));
    }

    public function pengelolaMapel(){
        $matapelajaran = MataPelajaran::select('*');
        $kelas = Kelas::select('*');

        return view('admin.pengelola-mata-pelajaran', compact('matapelajaran', 'kelas'));
    }
}
