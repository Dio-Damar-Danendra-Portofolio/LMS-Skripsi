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
        return view('admin.beranda-admin');
    }
}
?>
