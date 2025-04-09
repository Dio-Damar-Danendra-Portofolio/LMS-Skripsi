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

    public function index() {
        return view('awal');
    }
    public function laman_daftar()
    {
        $peran = ["Admin", "Guru", "Siswa"];
        return view('daftar', compact('peran'));
    }

    public function create(Request $request)
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

        return redirect()->to('awal')->with('success', 'Pengguna Berhasil Didaftarkan!');
    }

    public function berandaLMS(){
        return view('beranda');
    }
}
