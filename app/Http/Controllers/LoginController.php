<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('masuk');
    }

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

    public function beranda(Request $request){
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
            return redirect()->route('beranda');
        }
        else {
            return redirect()->back();
        }
    }

    public function berandaLMS(){
        return view('beranda');
    }

    public function keluar()
    {
        auth()->logout();
        return redirect()->back();
    }
}
