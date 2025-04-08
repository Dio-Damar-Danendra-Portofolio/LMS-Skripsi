<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use App\Models\UlanganHarian;
use App\Models\Guru;
use Illuminate\Support\Facades\DB;

class UlanganHarianController extends Controller
{
    public function __invoke(){

    }
    
    public function index(){
        return view('mata_pelajaran.daftar-ulangan-harian');
    }

    public function untukGuru(MataPelajaran $mapel){
        $ulangan = DB::table('UlanganHarian')->select('*')->get();

        $IDMapel = $mapel->id;
        $dataMapel = MataPelajaran::find($IDMapel);

        return view('mata_pelajaran.daftar-ulangan-harian-khusus-guru', compact('ulangan', 'dataMapel'));
    }

    public function tambahUlanganHarian(){
        return view('mata_pelajaran.tambah-ulangan-harian');
    }

    public function ulanganHarianBaru(Request $request){
        $ulangan = new UlanganHarian();
        $ulangan->JudulSoalUlanganHarian = $request->JudulSoalUlanganHarian;
        $ulangan->JenisUlanganHarian = $request->JenisUlanganHarian;
        $ulangan->WaktuUlanganHarian = $request->WaktuUlanganHarian;
        $ulangan->SoalUlanganHarian = $request->SoalUlanganHarian;
        $ulangan->PeruntukanKelas = $request->PeruntukanKelas;
        $ulangan->IDMataPelajaran = $request->IDMataPelajaran;
        $ulangan->IDMateri = $request->IDMateri;
        $ulangan->IDPengguna = $request->IDPengguna;

        $request->validate([
            'JudulSoalUlanganHarian' => 'required | min: 5',
            'SoalUlanganHarian' => 'required | mimes: pdf, zip, docx, doc, docm, 7z, gz, rar | max:50000',
            'JenisUlanganHarian' => 'required | min: 3',
            'WaktuUlanganHarian' => 'required | time',
            'PeruntukanKelas' => 'required | min: 4'
        ]);

        $request->IDMataPelajaran = DB::table('UlanganHarian')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'UlanganHarian.IDMataPelajaran')
        ->join('Kelas', 'Kelas.id', '=', 'MataPelajaran.IDKelas')
        ->select('Kelas.*', 'MataPelajaran.*', 'UlanganHarian.*')
        ->where('MataPelajaran.id', '=', $this->id)
        ->get();

        $request->IDMateri = DB::table('UlanganHarian')
        ->join('Materi', 'Materi.id', '=', 'UlanganHarian.IDMateri')
        ->join('Kelas', 'Kelas.id', '=', 'Materi.IDKelas')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'UlanganHarian.IDMataPelajaran')
        ->select('MataPelajaran.*', 'Materi.*', 'UlanganHarian.*')
        ->where('MataPelajaran.id', '=', $this->id)
        ->where('Materi.id', '=', $this->id)
        ->get();

        $request->IDPengguna = DB::table('UlanganHarian')
        ->join('Materi', 'Materi.id', '=', 'UlanganHarian.IDMateri')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'Materi.IDMataPelajaran')
        ->join('Users', 'Users.id', '=', 'MataPelajaran.IDPengguna')
        ->join('Users', 'Users.id', '=', 'UlanganHarian.IDPengguna')
        ->select('Users.*', 'UlanganHarian.*', 'MataPelajaran.*', 'Materi.*', 'UlanganHarian.*')
        ->get();

        $namaberkas = 'Soal Ulangan Harian '.$request->JenisUlanganHarian.'-'.time().$request->JudulSoalUlanganHarian.'.'.$request->file('SoalUlanganHarian')->extension();  

        $request->file('SoalUlanganHarian')->storeAs('uploads/Soal-Ulangan-Harian', $namaberkas);

        $ulangan->save();

        return redirect()->route('mata_pelajaran.daftar-ulangan-harian-khusus-guru')->with(['status' => 'Soal Ulangan Harian berhasil dibuat!']);
    }

    public function suntingSoalUlanganHarian(UlanganHarian $ulangan){
        $IDUlanganHarian = $ulangan->id;
        $dataUlanganHarian = UlanganHarian::findOrFail($IDUlanganHarian);
        return view('mata_pelajaran.sunting-ulangan-harian', compact('dataUlanganHarian'));
    }

    public function revisiUlanganHarian(Request $request, UlanganHarian $ulangan){
        $this->validate($request, [
            'JudulSoalUlanganHarian' => 'required | min: 5'->ignore($request->id),
            'SoalUlanganHarian' => 'required | mimes: pdf, zip, docx, doc, docm, 7z, gz, rar | max:50000'->ignore($request->id),
            'JenisUlanganHarian' => 'required | min: 3'->ignore($request->id),
            'WaktuUlanganHarian' => 'required | time'->ignore($request->id),
            'PeruntukanKelas' => 'required | min: 4'->ignore($request->id)
        ]);

        $request->IDMataPelajaran = DB::table('UlanganHarian')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'UlanganHarian.IDMataPelajaran')
        ->join('Kelas', 'Kelas.id', '=', 'MataPelajaran.IDKelas')
        ->select('Kelas.*', 'MataPelajaran.*', 'UlanganHarian.*')
        ->where('MataPelajaran.id', '=', $this->id)
        ->get();

        $request->IDMateri = DB::table('UlanganHarian')
        ->join('Materi', 'Materi.id', '=', 'UlanganHarian.IDMateri')
        ->join('Kelas', 'Kelas.id', '=', 'Materi.IDKelas')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'UlanganHarian.IDMataPelajaran')
        ->select('MataPelajaran.*', 'Materi.*', 'UlanganHarian.*')
        ->where('MataPelajaran.id', '=', $this->id)
        ->where('Materi.id', '=', $this->id)
        ->get();

        $request->IDPengguna = DB::table('UlanganHarian')
        ->join('Materi', 'Materi.id', '=', 'UlanganHarian.IDMateri')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'Materi.IDMataPelajaran')
        ->join('Users', 'Users.id', '=', 'MataPelajaran.IDPengguna')
        ->join('Users', 'Users.id', '=', 'UlanganHarian.IDPengguna')
        ->select('Users.*', 'UlanganHarian.*', 'MataPelajaran.*', 'Materi.*', 'UlanganHarian.*')
        ->get();

        return view();
    }
}
