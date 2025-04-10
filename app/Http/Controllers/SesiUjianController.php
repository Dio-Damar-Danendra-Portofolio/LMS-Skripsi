<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ujian;
use App\Models\User;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class SesiUjianController extends Controller
{

    public function __invoke(){
        //
    }

    public function index(){
        return view('siswa.ujian-siswa');
    }

    public function sesiUjian(){
        return view('guru.sesi-ujian');
    }
}
