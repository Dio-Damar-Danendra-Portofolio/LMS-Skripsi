<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ujian;
use App\Models\MataPelajaran;
use App\Models\Guru;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class UjianController extends Controller
{
    public function index(){
        return view('siswa.ujian-siswa');
    }

    public function ujianBaru(Request $request){
        $ujian = new Ujian();
        $ujian->JenisUjian = $request->JenisUjian;
        $ujian->RuangUjian = $request->RuangUjian;
        $ujian->WaktuUjian = $request->WaktuUjian;
        $ujian->SoalUjian = $request->SoalUjian;
        $ujian->JudulSoalUjian = $request->JudulSoalUjian;
        $ujian->NamaGuruMataPelajaran = $request->NamaGuruMataPelajaran;
        $ujian->MataPelajaran = $request->MataPelajaran;
        $ujian->PeruntukanKelas = $request->PeruntukanKelas;
        $ujian->IDKelas = $request->IDKelas;
        $ujian->IDMataPelajaran = $request->IDMataPelajaran;
        $ujian->IDPengguna = $request->IDPengguna;

        $request->validate([
            'JenisUjian'=>'required | min: 3',
            'RuangUjian'=>'required | min: 3',
            'WaktuUjian'=>'required',
            'SoalUjian'=>'required | mimes: doc, docx, docm, zip, 7z, gz, rar, pdf | max: 5000',
            'JudulSoalUjian' => 'required | min: 5',
            'NamaGuruMataPelajaran' =>'required | min: 3',
            'MataPelajaran' =>'required | min: 3'
        ]);

        $kelas = DB::table('Kelas')
        ->select('NamaKelas')
        ->get();

        $mapel = DB::table('mapel')
        ->select('NamaMataPelajaran')
        ->get();

        $request->IDKelas = Ujian::join('Kelas', 'Kelas.id', '=', 'Ujian.IDKelas')
        ->select('Kelas.*', 'Ujian.*')
        ->where($request->PeruntukanKelas, '=', $kelas)
        ->get();

        $request->IDMataPelajaran = Ujian::join('MataPelajaran', 'MataPelajaran.id', '=', 'Ujian.IDMataPelajaran')
        ->select('MataPelajaran.*', 'Ujian.*')
        ->where($request->MataPelajaran, '=', $mapel)
        ->get();

        $request->IDPengguna = Ujian::join('MataPelajaran', 'MataPelajaran.id', '=', 'Ujian.IDMataPelajaran')
        ->join('Users', 'Users.id', '=', 'MataPelajaran.IDPengguna')
        ->select('Users.*', 'MataPelajaran.*', 'Ujian.*')
        ->where(function(Builder $query){
            $query->where([
                ['Users.PeranPengguna', '=', 'Guru'],
                ['Users.MataPelajaran', '=', $request->MataPelajaran]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran, '=', $request->MataPelajaran]
            ]);
        })
        ->orWhere(function(Builder $query){
            $query->where([
                ['Users.PeranPengguna', '=', 'Guru'],
                ['Users.MataPelajaran2', '=', $request->MataPelajaran]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran2, '=', $request->MataPelajaran]
            ]);
        })
        ->orWhere(function(Builder $query){
            $query->where([
                ['Users.PeranPengguna', '=', 'Guru'],
                ['Users.MataPelajaran3', '=', $request->MataPelajaran]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran3, '=', $request->MataPelajaran]
            ]);
        })
        ->orWhere(function(Builder $query){
            $query->where([
                ['Users.PeranPengguna', '=', 'Guru'],
                ['Users.MataPelajaran4', '=', $request->MataPelajaran]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran4, '=', $request->MataPelajaran]
            ]);
        })
        ->get();

        $namaBerkasSoalUjian = 'Soal Ujian untuk '.$request->JenisUjian.' di '.$request->RuangUjian.' pada '
        .$request->WaktuUjian.'-'.$request->JudulSoalUjian.'.'.$request->file('SoalUjian')->extension();

        $request->file('SoalUjian')->storeAs('uploads/Soal-Ujian/', $namaBerkasSoalUjian);

        $ujian->save();

        return redirect()->route('admin.pengelola-ujian')->with(['status' => 'Soal Ujian berhasil dibuat!']);
    }

    public function suntingSoalUjian(Ujian $sesiUjian){
        $IDUjian = $sesiUjian->id;
        $dataUjian = Ujian::findOrFail($IDUjian);
        return redirect()->route('admin.sunting-ujian', compact('dataUjian'));
    }

    public function revisiSoalUjian(Request $request, Ujian $sesiUjian){
        $this->validate($request, [
            'JenisUjian'=>'required | min: 3',
            'RuangUjian'=>'required | min: 3',
            'WaktuUjian'=>'required | time',
            'SoalUjian'=>'required | mimes: doc, docx, docm, zip, 7z, gz, rar, pdf | max: 5000',
            'JudulSoalUjian' => 'required | min: 5',
            'NamaGuruMataPelajaran' =>'required | min: 3',
            'MataPelajaran' =>'required | min: 3'
        ]);

        $kelas = DB::table('Kelas')
        ->select('NamaKelas')
        ->get();

        $mapel = DB::table('mapel')
        ->select('NamaMataPelajaran')
        ->get();

        $request->IDKelas = Ujian::join('Kelas', 'Kelas.id', '=', 'Ujian.IDKelas')
        ->select('Kelas.*', 'Ujian.*')
        ->where($request->PeruntukanKelas, '=', $kelas)
        ->ignore($request->id)
        ->get();

        $request->IDMataPelajaran = Ujian::join('MataPelajaran', 'MataPelajaran.id', '=', 'Ujian.IDMataPelajaran')
        ->select('MataPelajaran.*', 'Ujian.*')
        ->where($request->MataPelajaran, '=', $mapel)
        ->ignore($request->id)
        ->get();

        $request->IDPengguna = Ujian::join('MataPelajaran', 'MataPelajaran.id', '=', 'Ujian.IDMataPelajaran')
        ->join('Users', 'Users.id', '=', 'MataPelajaran.IDPengguna')
        ->select('Users.*', 'MataPelajaran.*', 'Ujian.*')
        ->where(function(Builder $query){
            $query->where([
                ['Users.PeranPengguna', '=', 'Guru'],
                ['Users.MataPelajaran', '=', $request->MataPelajaran]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran, '=', $request->MataPelajaran]
            ]);
        })
        ->orWhere(function(Builder $query){
            $query->where([
                ['Users.PeranPengguna', '=', 'Guru'],
                ['Users.MataPelajaran2', '=', $request->MataPelajaran]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran2, '=', $request->MataPelajaran]
            ]);
        })
        ->orWhere(function(Builder $query){
            $query->where([
                ['Users.PeranPengguna', '=', 'Guru'],
                ['Users.MataPelajaran3', '=', $request->MataPelajaran]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran3, '=', $request->MataPelajaran]
            ]);
        })
        ->orWhere(function(Builder $query){
            $query->where([
                ['Users.PeranPengguna', '=', 'Guru'],
                ['Users.MataPelajaran4', '=', $request->MataPelajaran]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [Auth::user()->MataPelajaran4, '=', $request->MataPelajaran]
            ]);
        })
        ->ignore($request->id)
        ->get();

        $sesiUjian->id = $request->id;
        $IDUjian = $sesiUjian->id;
        $dataUjian = Ujian::findOrFail($IDUjian);
        
        if ($request->hasFile('SoalUjian')) {
            $ujian = $request->file('SoalUjian');
            Ujian::delete($dataUjian);

            $namaBerkasSoalUjian = 'Soal Ujian untuk '.$request->JenisUjian.' di '.$request->RuangUjian.' pada '
            .$request->WaktuUjian.'-'.$request->JudulSoalUjian.'-revisi.'.$request->file('SoalUjian')->extension();
            
            $berkasSoalUjian = $request->SoalUjian->storeAs('uploads/Soal-Ujian/', $namaBerkasSoalUjian);

            $request->update([
                'JenisUjian' => $request->JenisUjian,
                'RuangUjian' => $request->RuangUjian,
                'WaktuUjian' => $request->WaktuUjian,
                'SoalUjian' => $berkasSoalUjian,
                'JudulSoalUjian' => $request->JudulSoalUjian,
                'NamaGuruMataPelajaran' => $request->NamaGuruMataPelajaran,
                'MataPelajaran' => $request->MataPelajaran,
                'PeruntukanKelas' => $request->PeruntukanKelas,
                'IDKelas' => $request->IDKelas,
                'IDMataPelajaran' => $request->IDMataPelajaran,
                'IDPengguna' => $request->IDPengguna
            ]);

            return redirect()->route('admin.pengelola-ujian')->with(['status' => 'Soal Ujian berhasil direvisi dengan berkas']);
        }

        else {
            return redirect()->back();
        }
        return view('admin.pengelola-ujian', ['dataUjian' => $dataUjian]);
    }

    public function hapusSoalUjian(Ujian $sesiUjian){
        $IDUjian = $sesiUjian->id;
        $dataUjian = Ujian::findOrFail($IDUjian);
        Ujian::delete($dataUjian);
        $dataUjian->delete();
        return view('admin.pengelola-ujian', compact('dataUjian'))->with(['status' => 'Soal Ujian berhasil dihapus!']);
    }
}