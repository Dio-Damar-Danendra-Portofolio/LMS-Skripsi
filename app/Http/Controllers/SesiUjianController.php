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

    public function inputSesiUjian(Request $request){
        $sesiUjian = new Ujian();
        $sesiUjian->JenisUjian = $request->JenisUjian;
        $sesiUjian->RuangUjian = $request->RuangUjian;
        $sesiUjian->WaktuUjian = $request->WaktuUjian;
        $sesiUjian->JudulSoalUjian = $request->JudulSoalUjian;
        $sesiUjian->NamaGuruMataPelajaran = $request->NamaGuruMataPelajaran;
        $sesiUjian->MataPelajaran = $request->MataPelajaran;
        $sesiUjian->SoalUjian = $request->SoalUjian;
        $sesiUjian->IDMataPelajaran = $request->IDMataPelajaran;
        $sesiUjian->IDPengguna = $request->IDPengguna;

        $namaMataPelajaran = DB::table('MataPelajaran')
        ->select('NamaMataPelajaran')
        ->get();

        $namaGuru = DB::table('Users')
        ->select(DB::raw('CONCAT(NamaPertamaPengguna, NamaTerakhirPengguna) as NamaLengkapGuru'))
        ->where('PeranPengguna', '=', 'Guru')
        ->limit(1)
        ->get();

        $request->IDMataPelajaran = DB::table('Ujian')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'Ujian.IDMataPelajaran')
        ->select('MataPelajaran.*', 'Ujian.*')
        ->where($request->MataPelajaran, '=', $namaMataPelajaran)
        ->where($request->NamaGuruMataPelajaran, '=', $namaGuru)
        ->get();

        $request->IDPengguna = DB::table('Ujian')
        ->join('Users', 'Users.id', '=', 'Ujian.IDPengguna')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'Ujian.IDPengguna')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'Ujian.IDMataPelajaran')
        ->select('Users.*', 'Ujian.*', DB::raw('CONCAT(Users.NamaPertamaPengguna, Users.NamaTerakhirPengguna) as NamaLengkapGuru'))
        ->where(function(Builder $query){
                $query->where('Users.PeranPengguna', '=', 'Guru')
                ->where('Users.MataPelajaran', '=', $request->MataPelajaran);
            })
        ->orWhere(function(Builder $query){
            $query->where('Users.PeranPengguna', '=', 'Guru')
            ->where('Users.MataPelajaran2', '=', $request->MataPelajaran);
        })
        ->orWhere(function(Builder $query){
            $query->where('Users.PeranPengguna', '=', 'Guru')
            ->where('Users.MataPelajaran3', '=', $request->MataPelajaran);
        })
        ->orWhere(function(Builder $query){
            $query->where('Users.PeranPengguna', '=', 'Guru')
            ->where('Users.MataPelajaran4', '=', $request->MataPelajaran);
        })
        ->get();

        $request->validate([
            'JudulSoalUjian' => 'required | min: 5',
            'MataPelajaran' => 'required | min: 3',
            'WaktuUjian' => 'required | date_format: Y-m-d H:i:s',
            'NamaGuruMataPelajaran' => 'required | min: 3',
            'JenisUjian' => 'required | min: 3',
            'RuangUjian' => 'required | min : 6',
            'SoalUjian' => 'required | mimes: pdf, zip, gz, 7z, rar, doc, docm, docx | max:5000'
        ]);

        $namaberkas = 'Soal-Ujian-'.$request->JenisUjian.' '.$request->MataPelajaran.'-'.time().'.'.$request->file('SoalUjian')->extension();  

        $request->file('SoalUjian')->move(public_path('uploads/Soal-Ujian'), $namaberkas);

        $sesiUjian->save();

        return redirect()->route('admin.pengelola-ujian')->with(['success'=>'Soal Ujian berhasil dibuat!']);
    }

    public function suntingSesiUjian(Ujian $sesiUjian){
        $IDUjian = $sesiUjian->id;
        $dataUjian = Ujian::findOrFail($IDUjian);
        return view('admin.sunting-ujian', compact('dataUjian'));
    }

    public function revisiSesiUjian(Request $request, Ujian $sesiUjian){
        $request->validate([
            'JenisUjian' => 'min : 3'->ignore($request->id),
            'RuangUjian' => 'min : 6'->ignore($request->id),
            'SoalUjian' => 'mimes: pdf, zip, gz, 7z, rar, doc, docm, docx | max:5000'->ignore($request->id),
            'MataPelajaran' => 'min : 3'->ignore($request->id),
            'NamaGuruMataPelajaran' => 'min : 3'->ignore($request->id),
            'WaktuUjian' => 'date_format: H:i:s'
        ]);

        $namaMataPelajaran = DB::table('MataPelajaran')
        ->select('NamaMataPelajaran')
        ->get();

        $namaGuru = DB::table('Users')
        ->select(DB::raw('CONCAT(NamaPertamaPengguna, NamaTerakhirPengguna) as NamaLengkapGuru'))
        ->where('PeranPengguna', '=', 'Guru')
        ->limit(1)
        ->get();

        $request->IDMataPelajaran = DB::table('Ujian')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'Ujian.IDMataPelajaran')
        ->select('MataPelajaran.*', 'Ujian.*')
        ->where($request->MataPelajaran, '=', $namaMataPelajaran)
        ->where($request->NamaGuruMataPelajaran, '=', $namaGuru)
        ->ignore($request->id)
        ->get();

        $request->IDPengguna = DB::table('Ujian')
        ->join('Users', 'Users.id', '=', 'Ujian.IDPengguna')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'Ujian.IDPengguna')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'Ujian.IDMataPelajaran')
        ->select('Users.*', 'Ujian.*', DB::raw('CONCAT(Users.NamaPertamaPengguna, Users.NamaTerakhirPengguna) as NamaLengkapGuru'))
        ->where(function(Builder $query){
                $query->where('Users.PeranPengguna', '=', 'Guru')
                ->where('Users.MataPelajaran', '=', $request->MataPelajaran);
            })
        ->orWhere(function(Builder $query){
            $query->where('Users.PeranPengguna', '=', 'Guru')
            ->where('Users.MataPelajaran2', '=', $request->MataPelajaran);
        })
        ->orWhere(function(Builder $query){
            $query->where('Users.PeranPengguna', '=', 'Guru')
            ->where('Users.MataPelajaran3', '=', $request->MataPelajaran);
        })
        ->orWhere(function(Builder $query){
            $query->where('Users.PeranPengguna', '=', 'Guru')
            ->where('Users.MataPelajaran4', '=', $request->MataPelajaran);
        })
        ->ignore($request->id)
        ->get();
        $sesiUjian->id = $request->id;
        $IDUjian = $sesiUjian->id;
        $dataUjian = Ujian::findOrFail($IDUjian);

        $namaberkas = 'Soal-Ujian-'.$request->JenisUjian.'-'.time().'-revisi.'.$request->file->extension();  

        $request->file->move(public_path('uploads/Soal-Ujian'), $namaberkas);

        if ($request->hasFile('SoalUjian')){
            $soalUjian = $request->file('SoalUjian');

            $soalUjian->storeAs('uploads/Soal-Ujian', $soalUjian->$namaberkas);

            Storage::delete('uploads/Soal-Ujian'.$soalUjian->SoalUjian);

            $soalUjian->update([
                'SoalUjian' => $pengumuman->SoalUjian,
                'JenisUjian' => $request->JenisUjian,
                'RuangUjian' => $request->RuangUjian,
                'WaktuUjian' => $request->WaktuUjian,
                'IDMataPelajaran' => $request->IDMataPelajaran,
                'IDGuru' => $request->IDGuru
            ]);

            $request->save();
        }

        return redirect()->route('admin.daftar-ujian', [$id]);
    }

    public function destroyUjian($id){
        $soalUjian = Post::findOrFail($id);
        Storage::delete('uploads/Soal-Ujian/'. $soalUjian->SoalUjian);
        $soalUjian->delete();
        return redirect()->route('admin.daftar-ujian');
    }
}