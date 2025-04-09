<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Daftar;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()
    {
        return view('dashboard');
    }


    public function masuk()
    {
        return view('masuk');
    }

    public function daftar(Request $request)
    {
        User::create([
            'NamaPertamaPengguna' => $request->NamaPertamaPengguna,
            'NamaTerakhirPengguna' => $request->NamaTerakhirPengguna,
            'NomorIndukPengguna' => $request->NomorIndukPengguna,
            'SurelPengguna' => $request->SurelPengguna,
            'PeranPengguna' => $request->PeranPengguna,
            'NomorPonselPengguna' => $request->NomorPonselPengguna,
            'KataSandiPengguna' => $request->KataSandiPengguna,
            'TanggalLahirPengguna' => $request->TanggalLahirPengguna,
            'TahunMasukPengguna' => $request->TahunMasukPengguna,
        ]);

        return redirect()->route('awal');
    }

    // public function suntingProfilSiswa(Auth $pengguna){
    //     $IDPengguna = Auth::user()->id;
    //     $dataPengguna = Daftar::findOrFail($IDPengguna);
    //     return view('siswa.sunting-profil-siswa', compact('dataPengguna'));
    // }

    // public function suntingProfilGuru(Auth $pengguna){
    //     $IDPengguna = Auth::user()->id;
    //     $dataPengguna = Daftar::findOrFail($IDPengguna);
    //     return view('guru.sunting-profil-guru', compact('dataPengguna'));
    // }

    // public function suntingProfilAdmin(Auth $pengguna){
    //     $IDPengguna = Auth::user()->id;
    //     $dataPengguna = Daftar::findOrFail($IDPengguna);
    //     return view('admin.sunting-profil-admin', compact('dataPengguna'));
    // }

    // public function revisiProfilSiswa(Request $request, Auth $pengguna){
    //     $request->validate([
    //         'JenjangSiswa' => 'required | min:5',
    //         'KelasSiswa' => 'required | min:5',
    //         'JurusanSiswa' => 'required | min:5'
    //     ]);

    //     $siswaBaru->save();

    //     return redirect()->route('siswa.profil-siswa')->with(['success' => 'Profil Siswa berhasil diperbarui!']);
    // }

    // public function revisiProfilGuru(Request $request, Auth $pengguna){
    //     $guruBaru->MataPelajaran = $request->MataPelajaran;
    //     $guruBaru->MataPelajaran2 = $request->MataPelajaran2;
    //     $guruBaru->MataPelajaran3 = $request->MataPelajaran3;
    //     $guruBaru->MataPelajaran4 = $request->MataPelajaran4;

    //     $guruBaru->save();

    //     return redirect()->route('guru.profil-guru')->with(['success' => 'Profil Guru berhasil diperbarui!']);
    // }

    // public function revisiProfilAdmin(Request $request, Auth $pengguna){
    //     $guruBaru->DivisiAdmin = $request->DivisiAdmin;

    //     $guruBaru->save();

    //     return redirect()->route('admin.profil-admin')->with(['success' => 'Profil Admin berhasil diperbarui!']);
    // }

    public function otentikasi(Request $request)
    {
        $masuk = [
            "NomorIndukPengguna" => $request->NomorIndukPengguna,
            "NamaPertamaPengguna" => $request->NamaPertamaPengguna,
            "NamaTerakhirPengguna" => $request->NamaTerakhirPengguna,
            "SurelPengguna" => $request->SurelPengguna,
            "KataSandiPengguna" => $request->KataSandiPengguna,
            "NomorPonselPengguna" => $request->NomorPonselPengguna,
            "TanggalLahirPengguna" => $request->TanggalLahirPengguna,
            "FotoProfilPengguna" => $request->FotoProfilPengguna,
            "TahunMasukPengguna" => $request->TahunMasukPengguna
        ];

        Auth::attempt($masuk);
            if (Auth::check()) {
                $remember = true;
                return redirect()->route('awal');
            }
            else {
                return redirect()->back();
            }
    }

    // public function beranda(Request $request){
    //     $masuk = [
    //         "NomorIndukPengguna" => $request->NomorIndukPengguna,
    //         "NamaPertamaPengguna" => $request->NamaPertamaPengguna,
    //         "NamaTerakhirPengguna" => $request->NamaTerakhirPengguna,
    //         "SurelPengguna" => $request->SurelPengguna,
    //         "KataSandiPengguna" => $request->KataSandiPengguna,
    //         "NomorPonselPengguna" => $request->NomorPonselPengguna,
    //         "TanggalLahirPengguna" => $request->TanggalLahirPengguna,
    //         "FotoProfilPengguna" => $request->FotoProfilPengguna,
    //         "TahunMasukPengguna" => $request->TahunMasukPengguna
    //     ];

    //     Auth::attempt($masuk);

    //     if (Auth::check()) {
    //         auth()->login($masuk);
    //         $request->session()->regenerate();
    //         return redirect()->route('beranda');
    //     }
    //     else {
    //         return redirect()->back();
    //     }
    // }

    public function berandaLMS(){
        return view('beranda');
    }

    public function keluar()
    {
        Auth::logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        // return redirect()->route('masuk');
    }
}
