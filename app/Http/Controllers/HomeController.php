<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

    if ($user->hasRole('Admin')) {
        return redirect()->route('admin.beranda-admin');
    }

    if ($user->hasRole('Guru')) {
        return redirect()->route('guru.beranda-guru');
    }

    if ($user->hasRole('Siswa')) {
        return redirect()->route('siswa.beranda-siswa');
    }

    abort(403);
    }
}
