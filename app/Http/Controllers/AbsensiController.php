<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Absensi;
use App\Models\MataPelajaran;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Session;

class AbsensiController extends Controller
{
    public function index(Absensi $absensi){
        $dataAbsensi = $absensi->id;
        $IDAbsensi = Absensi::find($dataAbsensi);
        return view('guru.absensi', compact('dataAbsensi'));
    }

    public function daftarSiswaKelas10IPA(){
        $siswa = DB::table('Kelas')
        ->join('Users', 'Users.id', '=', 'Kelas.IDPengguna')
        ->select('Kelas.*', 'Users.*', DB::raw('count(Users.*) as JumlahSiswa'))
        ->where([
            ['Users.PeranPengguna', '=', 'Siswa'], 
            ['Users.KelasSiswa', 'like', 'X IPA %'],
            ['Users.JurusanSiswa', '=', 'Ilmu Pengetahuan Alam (IPA)']
        ])
        ->get();

        return view('guru.absensi');
    }

    public function daftarSiswaKelas10IPS(){
        $siswa = Kelas::join('Users', 'Users.id', '=', 'Kelas.IDPengguna')
        ->select('Kelas.*', 'Users.*', DB::raw('count(Users.*) as JumlahSiswa'))
        ->where([
            ['Users.PeranPengguna', '=', 'Siswa'], 
            ['Users.KelasSiswa', 'like', 'X IPS %'],
            ['Users.JurusanSiswa', '=', 'Ilmu Pengetahuan Sosial (IPS)']
        ])
        ->get();

        return view('guru.absensi');
    }

    public function daftarSiswaKelas10Bahasa(){
        $siswa = Kelas::join('Users', 'Users.id', '=', 'Kelas.IDPengguna')
        ->select('Kelas.*', 'Users.*', DB::raw('count(Users.*) as JumlahSiswa'))
        ->where([
            ['Users.PeranPengguna', '=', 'Siswa'], 
            ['Users.KelasSiswa', 'like', 'X Bahasa %'],
            ['Users.JurusanSiswa', '=', 'Bahasa']
        ])
        ->get();
        
        return view('guru.absensi');
    }

    public function daftarSiswaKelas11IPA(){
        $siswa = DB::table('Kelas')->join('Users', 'Users.id', '=', 'Kelas.IDPengguna')
        ->select('Users.*', 'Kelas.*', DB::raw('count(Users.*) as JumlahSiswa'))
        ->where([
            ['Users.PeranPengguna', '=', 'Siswa'], 
            ['Users.KelasSiswa', 'like', '11 IPA %'],
            ['Users.JurusanSiswa', '=', 'Ilmu Pengetahuan Alam (IPA)']
        ])
        ->get();

        return view('guru.absensi');
    }

    public function daftarSiswaKelas11IPS(){
        $siswa = Kelas::join('Users', 'Users.id', '=', 'Kelas.IDPengguna')
        ->select('Users.*', DB::raw('count(Users.*) as JumlahSiswa'))
        ->where([
            ['Users.PeranPengguna', '=', 'Siswa'], 
            ['Users.KelasSiswa', 'like', '11 IPS %'],
            ['Users.JurusanSiswa', '=', 'Ilmu Pengetahuan Sosial (IPS)']
        ])
        ->get();

        return view('guru.absensi');
    }

    public function daftarSiswaKelas11Bahasa(){
        $siswa = Kelas::join('Users', 'Users.id', '=', 'Kelas.IDPengguna')
        ->select('Users.*', 'Kelas.*', DB::raw('count(Users.*) as JumlahSiswa'))
        ->where([
            ['Users.PeranPengguna', '=', 'Siswa'], 
            ['Users.KelasSiswa', 'like', '11 Bahasa %'],
            ['Users.JurusanSiswa', '=', 'Bahasa']
        ])
        ->get();

        return view('guru.absensi');
    }

    public function daftarSiswaKelas12IPA(){
        $siswa = Kelas::join('Users', 'Users.id', '=', 'Kelas.IDPengguna')
        ->select('Users.*', 'Kelas.*', DB::raw('count(Users.*) as JumlahSiswa'))
        ->where([
            ['Users.PeranPengguna', '=', 'Siswa'], 
            ['Users.KelasSiswa', 'like', '12 IPA %'],
            ['Users.JurusanSiswa', '=', 'Ilmu Pengetahuan Alam (IPA)']
        ])
        ->get();

        return view('guru.absensi');
    }

    public function daftarSiswaKelas12IPS(){
        $siswa = Kelas::join('Users', 'Users.id', '=', 'Kelas.IDPengguna')
        ->select('Users.*', 'Kelas.*', DB::raw('count(Users.*) as JumlahSiswa'))
        ->where([
            ['Users.PeranPengguna', '=', 'Siswa'], 
            ['Users.KelasSiswa', 'like', '12 IPS %'],
            ['Users.JurusanSiswa', '=', 'Ilmu Pengetahuan Sosial (IPS)']
        ])
        ->get();

        return view('guru.absensi');
    }

    public function daftarSiswaKelas12Bahasa(){
        $siswa = Kelas::join('Users', 'Users.id', '=', 'Kelas.IDPengguna')
        ->select('Users.*', DB::raw('count(Users.*) as JumlahSiswa'))
        ->where([
            ['Users.PeranPengguna', '=', 'Siswa'], 
            ['Users.KelasSiswa', 'like', '12 Bahasa %'],
            ['Users.JurusanSiswa', '=', 'Bahasa']
        ])
        ->get();

        return view('guru.absensi');
    }

    public function rekapAbsensi(Request $request){
        $absensi = new Absensi();
        $absensi->StatusKehadiran = $request->StatusKehadiran;
        $absensi->WaktuCheckIn = $request->WaktuCheckIn;
        $absensi->PenyebabKetidakHadiran = $request->PenyebabKetidakHadiran;
        $absensi->StatusKeterlambatan = $request->StatusKeterlambatan;
        $absensi->PenyebabKeterlambatan = $request->PenyebabKeterlambatan;
        $absensi->Semester = $request->Semester;
        $absensi->SesiMateri = $request->SesiMateri;
        $absensi->IDMataPelajaran = $request->IDMataPelajaran;
        $absensi->IDPengguna = $request->IDPengguna;
        $absensi->IDKelas = $request->IDKelas;

        $request->validate([
            'StatusKehadiran' => 'required | boolean',
            'PenyebabKetidakHadiran' => 'required | min: 4',
            'StatusKeterlambatan' => 'required | boolean',
            'PenyebabKeterlambatan' => 'required | min: 4',
            'WaktuCheckIn' => 'required | time',
            'SesiMateri' => 'nullable | min: 3',
            'Semester' => 'nullable | min: 3'
        ]);

        $MaPel = Guru::get('Users.MataPelajaran');

        $MaPel2 = Guru::get('Users.MataPelajaran2');

        $MaPel3 = Guru::get('Users.MataPelajaran3');

        $MaPel4 = Guru::get('Users.MataPelajaran4');
        
        $request->IDMataPelajaran = DB::table('Absensi')
        ->join('MataPelajaran', 'MataPelajaran.id', '=',  'Absensi.IDMataPelajaran')
        ->join('Users', 'Users.id', '=', 'MataPelajaran.IDPengguna')
        ->join('Users', 'Users.id', '=', 'Absensi.IDPengguna')
        ->select('MataPelajaran.*', 'Absensi.*', 'Users.*')
        ->where(function(Builder $query){
            $query->where([
                ['Users.PeranPengguna', '=', 'Guru'],
                ['MataPelajaran.NamaMataPelajaran', '=', $MaPel]
            ])
            ->orWhere([
                [Auth::user()->MataPelajaran, '=', 'MataPelajaran.NamaMataPelajaran'],
                [Auth::user()->PeranPengguna, '=', 'Guru']
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran, '=', $MaPel]
            ]);
        })
        ->orWhere(function(Builder $query){
            $query->where([
                ['Users.PeranPengguna', '=', 'Guru'],
                ['MataPelajaran.NamaMataPelajaran', '=', $MaPel2]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran2, '=', $MaPel2]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran2, '=', 'MataPelajaran.NamaMataPelajaran']
            ]);
        })
        ->orWhere(function(Builder $query){
            $query->where([
                ['Users.PeranPengguna', '=', 'Guru'],
                ['MataPelajaran.NamaMataPelajaran', '=', $MaPel3]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran3, '=', $MaPel3]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran3, '=', 'MataPelajaran.NamaMataPelajaran']
            ]);
        })
        ->orWhere(function(Builder $query){
            $query->where([
                ['Users.PeranPengguna', '=', 'Guru'],
                ['MataPelajaran.NamaMataPelajaran', '=', $MaPel4]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran4, '=', $MaPel4]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran4, '=', 'MataPelajaran.NamaMataPelajaran']
            ]);
        })
        ->limit(1)
        ->get();

        $request->IDPengguna = DB::table('Absensi')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'Absensi.IDMataPelajaran')
        ->join('Users', 'Users.id', '=', 'Absensi.IDPengguna')
        ->select('Users.*', 'Absensi.*', 'MataPelajaran.*')
        ->where([
            ['Users.PeranPengguna', '=', 'Guru']
        ])
        ->orWhere(function(Builder $query){
            $query->where(Auth::user()->PeranPengguna, '=', 'Guru')
            ->where(Auth::user()->is_active, '=', 1);
        })
        ->get();

        $kelas = Kelas::select('NamaKelas')
        ->get();

        $request->IDKelas = Absensi::join('Kelas', 'Kelas.id', '=', 'Absensi.IDKelas')
        ->join('Users', 'Users.id', '=', 'Kelas.IDPengguna')
        ->select('Users.*', 'Kelas.*', 'Absensi.*')
        ->where('Kelas.NamaKelas', '=', $kelas)
        ->get();

        $absensi->save();

        return redirect()->route('guru.absensi')->with(['status' => 'Absensi berhasil direkap!']);
    }

    public function editAbsensi(Absensi $absensi){
        $IDAbsensi = $absensi->id;
        $dataAbsensi = Absensi::findOrFail($IDAbsensi);
        return view('guru.absensi', compact('dataAbsensi'));
    }

    public function rekapUlang(Request $request, Absensi $absensi){
        $this->validate($request, [
            'StatusKehadiran' => 'required | boolean'->ignore($request->id),
            'PenyebabKetidakHadiran' => 'required | min: 4'->ignore($request->id),
            'StatusKeterlambatan' => 'required | boolean'->ignore($request->id),
            'WaktuCheckIn' => 'required | time'->ignore($request->id),
            'SesiMateri' => 'nullable | min: 3'->ignore($request->id),
            'PenyebabKeterlambatan' => 'required | min: 4'->ignore($request->id),
            'Semester' => 'nullable | min: 3'->ignore($request->id)
        ]);

        $IDAbsensi = $absensi->id;
        $dataAbsensi = Absensi::findOrFail($IDAbsensi);

        $MaPel = Guru::get('Users.MataPelajaran');

        $MaPel2 = Guru::get('Users.MataPelajaran2');

        $MaPel3 = Guru::get('Users.MataPelajaran3');

        $MaPel4 = Guru::get('Users.MataPelajaran4');
        
        $request->IDMataPelajaran = DB::table('Absensi')
        ->join('MataPelajaran', 'MataPelajaran.id', '=',  'Absensi.IDMataPelajaran')
        ->join('Users', 'Users.id', '=', 'MataPelajaran.IDPengguna')
        ->select('MataPelajaran.*', 'Absensi.*', 'Users.*')
        ->where(function(Builder $query){
            $query->where([
                ['MataPelajaran.NamaMataPelajaran', '=',  $MaPel],
                ['Users.PeranPengguna', '=',  'Guru']
            ]);
        })
        ->orWhere(function(Builder $query){
            $query->where([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran, '=', $MaPel]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran, '=', 'MataPelajaran.NamaMataPelajaran']
            ]);
        })
        ->orWhere(function(Builder $query){
            $query->where([
                ['Users.PeranPengguna', '=', 'Guru'],
                ['MataPelajaran.NamaMataPelajaran', '=', $MaPel2]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran2, '=', $MaPel2]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran2, '=', 'MataPelajaran.NamaMataPelajaran']
            ]);
        })
        ->orWhere(function(Builder $query){
            $query->where([
                ['Users.PeranPengguna', '=', 'Guru'],
                ['MataPelajaran.NamaMataPelajaran', '=', $MaPel3]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran3, '=', $MaPel3]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran3, '=', 'MataPelajaran.NamaMataPelajaran']
            ]);
        })
        ->orWhere(function(Builder $query){
            $query->where([
                ['Users.PeranPengguna', '=', 'Guru'],
                ['MataPelajaran.NamaMataPelajaran', '=', $MaPel4]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran4, '=', $MaPel4]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran4, '=', 'MataPelajaran.NamaMataPelajaran']
            ]);
        })
        ->limit(1)
        ->ignore($request->id)
        ->get();

        $request->IDPengguna = Absensi::join('MataPelajaran', 'MataPelajaran.id', '=', 'Absensi.IDMataPelajaran')
        ->join('Users', 'Users.id', '=', 'Absensi.IDPengguna')
        ->select('Users.*', 'Absensi.*', 'MataPelajaran.*')
        ->where(function(Builder $query){
            $query->where([
                ['Users.PeranPengguna', '=', 'Guru'],
                ['Users.MataPelajaran', '=', $MaPel]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran, '=', $MaPel]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran, '=', 'MataPelajaran.NamaMataPelajaran']
            ]);
        })
        ->orWhere(function(Builder $query){
            $query->where([
                ['Users.PeranPengguna', '=', 'Guru'],
                ['Users.MataPelajaran2', '=', $MaPel2]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran2, '=', $MaPel2]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran2, '=', 'MataPelajaran.NamaMataPelajaran']
            ]);
        })
        ->orWhere(function(Builder $query){
            $query->where([
                ['Users.PeranPengguna', '=', 'Guru'],
                ['Users.MataPelajaran3', '=', $MaPel3]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran3, '=', $MaPel3]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran3, '=', 'MataPelajaran.NamaMataPelajaran']
            ]);
        })
        ->orWhere(function(Builder $query){
            $query->where([
                ['Users.PeranPengguna', '=', 'Guru'],
                ['Users.MataPelajaran4', '=', $MaPel4]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran4, '=', $MaPel4]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran4, '=', 'MataPelajaran.NamaMataPelajaran']
            ]);
        })
        ->limit(1)
        ->ignore($request->id)
        ->get();

        $kelas = Kelas::select('NamaKelas')
        ->get();

        $request->IDKelas = Absensi::join('Kelas', 'Kelas.id', '=', 'Absensi.IDKelas')
        ->join('Users', 'Users.id', '=', 'Kelas.IDPengguna')
        ->select('Users.*', 'Kelas.*', 'Absensi.*')
        ->where('Kelas.NamaKelas', '=', $kelas)
        ->ignore($request->id)
        ->get();

        $absensiSiswa->update([
            'StatusKehadiran' => $request->StatusKehadiran,
            'PenyebabKetidakHadiran' => $request->PenyebabKetidakHadiran,
            'StatusKeterlambatan' => $request->StatusKeterlambatan,
            'WaktuCheckIn' => $request->WaktuCheckIn,
            'SesiMateri' => $request->SesiMateri,
            'PenyebabKeterlambatan' => $request->PenyebabKeterlambatan,
            'Semester' => $request->Semester, 
            'IDMataPelajaran' => $request->IDMataPelajaran,
            'IDPengguna' => $request->IDPengguna,
            'IDKelas' => $request->IDKelas
        ])->ignore($request->id);

        $absensiSiswa->save();

        return redirect()->route('guru.absensi')->with(['success' => 'Absensi telah direkap ulang!']);
    }
}