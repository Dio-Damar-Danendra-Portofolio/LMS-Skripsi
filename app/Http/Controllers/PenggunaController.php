<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Daftar;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Models\Peran;
use App\Models\Guru;
use App\Models\Admin;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

class PenggunaController extends Controller
{

    public function index()
    {
        $peran = ["Admin", "Guru", "Siswa"];
        return view('daftar', compact('peran'));
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

    public function otentikasi(Request $request)
    {

    }

    public function beranda(Request $request){
        // $masuk = [
        //     "NomorIndukPengguna" => $request->NomorIndukPengguna,
        //     "NamaPertamaPengguna" => $request->NamaPertamaPengguna,
        //     "NamaTerakhirPengguna" => $request->NamaTerakhirPengguna,
        //     "SurelPengguna" => $request->SurelPengguna,
        //     "KataSandiPengguna" => $request->KataSandiPengguna,
        //     "NomorPonselPengguna" => $request->NomorPonselPengguna,
        //     "TanggalLahirPengguna" => $request->TanggalLahirPengguna,
        //     "FotoProfilPengguna" => $request->FotoProfilPengguna,
        //     "TahunMasukPengguna" => $request->TahunMasukPengguna
        // ];

        // Auth::attempt($masuk);
        // if (Auth::check()) {
        //     $remember = true;
        //     return redirect()->route('beranda');
        // }
        // else {
        //     return redirect()->back();
        // }
    }

    public function berandaLMS(){
        return view('beranda');
    }

    public function keluar()
    {
        // auth()->logout();
        // return redirect()->back();
    }
}
