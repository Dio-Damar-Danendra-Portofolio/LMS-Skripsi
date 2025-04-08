<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Validation\Factory;

class HomeController extends Controller
{
    public function index()
    {
        return view('awal');
    }

    public function beranda(){
        if(Auth::attempt($masuk, $remember)){
            if (Auth::user()->PeranPengguna == 'Siswa') {
                return redirect()->route('siswa.beranda-siswa');
            }

            elseif (Auth::user()->PeranPengguna == 'Guru') {
                return redirect()->route('guru.beranda-guru'); 
            }

            elseif (Auth::user()->PeranPengguna == 'Admin') {
                return redirect()->route('admin.beranda-admin');
            }

            else {
                return redirect()->back();
            }
        }
    }
}