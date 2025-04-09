<?php

namespace App\Http\Controllers;

use GuzzleHttp\RedirectMiddleware;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

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

        $credentials = $request->validate([
            'SurelPengguna' => 'required|email',
            'KataSandiPengguna'=> 'required|min:8'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            switch ($user->role) {
                case 'Admin':
                    return redirect()->route('dashboard')->with('success', 'Selamat datang!');
                case 'Guru':
                    return redirect()->route('dashboard')->with('success', 'Selamat datang!');
                case 'Siswa':
                    return redirect()->route('dashboard')->with('success', 'Selamat datang!');
                default:
                    Auth::logout();
                    return redirect()->route('masuk')->withErrors(['SurelPengguna' => 'Pengguna tidak valid']);
            }
        }
        return redirect()->route('dashboard')->with('success', 'Selamat datang!');
    }

    public function keluar(Request $request):RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('masuk');
    }
}
