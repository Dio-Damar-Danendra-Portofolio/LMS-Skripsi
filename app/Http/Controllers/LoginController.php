<?php

namespace App\Http\Controllers;

use GuzzleHttp\RedirectMiddleware;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use View;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        return view('masuk');
    }

    public function masuk(Request $request):RedirectResponse
        {

        if (Auth::attempt($request->only('SurelPengguna', 'KataSandiPengguna'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            switch ($user->PeranPengguna) {
                case 'Admin':
                    return redirect()->route('admin.beranda-admin')->with('success', 'Selamat datang!');
                case 'Guru':
                    return redirect()->route('guru.beranda-guru')->with('success', 'Selamat datang!');
                case 'Siswa':
                    return redirect()->route('siswa.beranda-siswa')->with('success', 'Selamat datang!');
                default:
                    Auth::logout();
                    return redirect()->route('masuk')->withErrors(['SurelPengguna' => 'Pengguna tidak valid']);
            }
        }
        return redirect()->route('beranda')->withErrors(['SurelPengguna' => 'Surel atau Kata Sandi Pengguna tidak valid']);
    }

    public function keluar(Request $request):RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('masuk');
    }

    public function beranda(): RedirectResponse
    {
        return redirect()->route('beranda');
    }
}
