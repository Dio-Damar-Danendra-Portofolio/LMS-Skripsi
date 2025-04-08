<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TugasMandiri;
use App\Models\User;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
use App\Models\MataPelajaran;

class TugasMandiriController extends Controller
{
    public function __invoke(){
        
    }

    public function index(){
        return view('mata_pelajaran.daftar-tugas-mandiri-khusus-siswa');
    }

    public function tugasBaru(){
        return view('mata_pelajaran.tugas-mandiri-baru');
    }

    public function untukGuru(){
        return view('mata_pelajaran.daftar-tugas-mandiri-khusus-guru');
    }

    public function tugasMandiriBaru(Request $request){
        $tugasMandiri = new TugasMandiri();
        $tugasMandiri->JudulSoalTugasMandiri = $request->JudulSoalTugasMandiri;
        $tugasMandiri->TenggatWaktuTugasMandiri = $request->TenggatWaktuTugasMandiri;
        $tugasMandiri->BerkasTugasMandiri = $request->BerkasTugasMandiri;
        $tugasMandiri->MateriSoal = $request->MateriSoal;
        $tugasMandiri->IDMataPelajaran = $request->IDMataPelajaran;
        $tugasMandiri->IDPengguna = $request->IDPengguna;

        $request->validate([
            'JudulSoalTugasMandiri' => 'required | min: 10',
            'TenggatWaktuTugasMandiri' => 'required',
            'BerkasTugasMandiri' => 'required | mimes: pdf, docx, docm, 
            doc, pptx, ppt, pptm, xlsx, xls, zip, 7z, rar, gz| max:5000',
            'MateriSoal' => 'required | min: 3'
        ]);

        $namaKelas = DB::table('Kelas')
        ->select('NamaKelas')
        ->get();

        $request->IDMataPelajaran = DB::table('TugasMandiri')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'TugasMandiri.IDMataPelajaran')
        ->join('Kelas', 'Kelas.id', '=', 'MataPelajaran.IDKelas')
        ->select('Kelas.*', 'MataPelajaran.*', 'TugasMandiri.*')
        ->where(function(Builder $query){
                $query->where('MataPelajaran.PeruntukanKelas', '=', $namaKelas)
                ->where('TugasMandiri.PeruntukanKelas', '=', $namaKelas);
            })
        ->get();        

        $request->IDPengguna = Auth::user()->id
        ->where('PeranPengguna', '=', 'Guru')
        ->get();

        $namaBerkas = 'Tugas Mandiri'.'-'.time().$request->JudulSoalTugasMandiri.'.'.$request->file('BerkasTugasMandiri')->extension();
        $lokasi = $request->file('BerkasTugasMandiri')->storeAs('uploads/Soal-Tugas-Mandiri', $namaberkas);
        
        $tugasMandiri->save();

        return redirect()->route('mata_pelajaran.daftar-tugas-mandiri')->with(['status' => 'Soal Tugas Mandiri berhasil dibuat!']);
    }

    public function suntingTugasMandiri(){
        return view('mata_pelajaran.sunting-tugas-mandiri');
    }

    public function daftarTugasMandiri(){
        return view('mata_pelajaran.daftar-tugas-mandiri');
    }

    public function revisiTugasMandiri(Request $request, TugasMandiri $tugas){
        $this->validate($request, [
            'JudulSoalTugasMandiri' => 'required | min: 10' -> ignore($request->id),
            'TenggatWaktuTugasMandiri' => 'required' -> ignore($request->id),
            'BerkasTugasMandiri' => 'required | mimes: pdf, docx, docm, 
            doc, pptx, ppt, pptm, xlsx, xls, zip, 7z, rar, gz| max:5000' -> ignore($request->id),
            'MateriSoal' => 'required | min: 3' -> ignore($request->id)
        ]);

        $namaKelas = DB::table('Kelas')
        ->select('NamaKelas')
        ->get();

        $request->IDMataPelajaran = DB::table('TugasMandiri')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'TugasMandiri.IDMataPelajaran')
        ->join('Kelas', 'Kelas.id', '=', 'MataPelajaran.IDKelas')
        ->select('Kelas.*', 'MataPelajaran.*', 'TugasMandiri.*')
        ->where(function(Builder $query){
                $query->where('MataPelajaran.PeruntukanKelas', '=', $namaKelas)
                ->where('TugasMandiri.PeruntukanKelas', '=', $namaKelas);
            })
        ->ignore($request->id)
        ->get();        

        $request->IDPengguna = Auth::user()->id
        ->where('PeranPengguna', '=', 'Guru')
        ->ignore($request->id)
        ->get();


        $IDTugasMandiri = $tugas->id;
        $dataTugasMandiri = TugasMandiri::findOrFail($IDTugasMandiri);
        TugasMandiri::delete($dataTugasMandiri);

        $namaBerkas = 'Tugas Mandiri'.'-'.time().$request->JudulSoalTugasMandiri.'-revisi.'.$request->file('BerkasTugasMandiri')->extension();
        $berkasTugasMandiri = $request->file('BerkasTugasMandiri')->storeAs('uploads/Soal-Tugas-Mandiri', $namaBerkas);
        
        $request->update([
            'JudulSoalTugasMandiri' => $request->JudulSoalTugasMandiri,
            'TenggatWaktuTugasMandiri' => $request->TenggatWaktuTugasMandiri,
            'BerkasTugasMandiri' => $berkasTugasMandiri,
            'MateriSoal' => $request->MateriSoal,
            'IDMataPelajaran' => $request->IDMataPelajaran,
            'IDPengguna' => $request->IDPengguna
        ]);

        return redirect()->route('mata_pelajaran.daftar-tugas-mandiri')->with(['status' => 'Soal Tugas Mandiri berhasil direvisi!']);
    }

    public function hapusTugasMandiri(TugasMandiri $tugas){
        $IDTugasMandiri = $tugas->id;
        $dataTugasMandiri = TugasMandiri::findOrFail($IDTugasMandiri);
        TugasMandiri::delete($dataTugasMandiri);
        $dataTugasMandiri->delete();
        return view('mata_pelajaran.daftar-tugas-mandiri', compact('dataTugasMandiri'))->with(['status' => 'Soal Tugas Mandiri berhasil dihapus!']);
    }
}