<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LembarJawabanTugasMandiri;
use App\Models\TugasMandiri;
use App\Models\MataPelajaran;
use App\Models\User;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;

class LembarJawabanTugasMandiriController extends Controller
{
    public function index(){
        return view('mata_pelajaran.tugas-mandiri');
    }

    public function jawabanTugasMandiri(Request $request){
        $jawaban = new LembarJawabanTugasMandiri();
        $jawaban->JudulLembarJawabanTugasMandiri = $request->JudulLembarJawabanTugasMandiri;
        $jawaban->BerkasLembarJawabanTugasMandiri = $request->BerkasLembarJawabanTugasMandiri;
        $jawaban->NilaiTugasMandiri = $request->NilaiTugasMandiri;
        $jawaban->IDTugasMandiri = $request->IDTugasMandiri;
        $jawaban->IDPengguna = $request->IDPengguna;

        $request->IDTugasMandiri = DB::table('LembarJawabanTugasMandiri')
        ->join('TugasMandiri', 'TugasMandiri.id', '=', 'LembarJawabanTugasMandiri.IDTugasMandiri')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'TugasMandiri.IDMataPelajaran')
        ->join('Users', 'Users.id', '=', 'TugasMandiri.IDPengguna')
        ->select('TugasMandiri.*', 'LembarJawabanTugasMandiri.*')
        ->get();
        
        $request->IDPengguna = DB::table('LembarJawabanTugasMandiri')
        ->join('Users', 'Users.id', '=', 'LembarJawabanTugasMandiri.IDPengguna')
        ->select('Users.*', 'LembarJawabanTugasMandiri.*')
        ->where('Users.PeranPengguna', '=', 'Siswa')
        ->orWhere(Auth::user()->PeranPengguna, '=', 'Siswa')
        ->get();

        $request->validate([
            'JudulLembarJawabanTugasMandiri' => 'required | min: 5',
            'BerkasLembarJawabanTugasMandiri' => 'required | mimes: pdf, docx, doc, docm, zip, rar, 7z, gz | max: 5000',
            'NilaiTugasMandiri' => 'nullable | float'
        ]);

        $namaBerkas = 'Jawaban Tugas Mandiri '.time().' oleh '.Auth::user()->NomorIndukPengguna.'-'.Auth::user()->NamaPertamaPengguna.' '.Auth::user()->NamaTerakhirPengguna.'.'.$request->file('BerkasLembarJawabanTugasMandiri')->extension();
        $lokasi = $request->file('BerkasLembarJawabanTugasMandiri')->storeAs('uploads/Lembar-Jawaban-Tugas-Mandiri/', $namaBerkas);

        $jawaban->save();

        return redirect()->route('mata_pelajaran.tugas-mandiri')->with(['success' => 'Tugas Mandiri berhasil dijawab!']);
    }

    public function suntingJawaban(LembarJawabanTugasMandiri $jawaban){
        $IDJawaban = $jawaban->id;
        $dataJawaban = LembarJawabanTugasMandiri::findOrFail($IDJawaban); 
        return view('mata_pelajaran.tugas-mandiri', compact('dataJawaban'));
    }

    public function revisiJawaban(Request $request, LembarJawabanTugasMandiri $jawaban){
        $request->validate([
            'JudulLembarJawabanTugasMandiri' => 'required | min: 5' ->ignore($request->id),
            'BerkasLembarJawabanTugasMandiri' => 'required | mimes: pdf, docx, doc, docm, zip, rar, 7z, gz | 
            max: 5000'->ignore($request->id)
        ]);

        $request->IDTugasMandiri = DB::table('LembarJawabanTugasMandiri')
        ->join('TugasMandiri', 'TugasMandiri.id', '=', 'LembarJawabanTugasMandiri.IDTugasMandiri')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'TugasMandiri.IDMataPelajaran')
        ->join('Users', 'Users.id', '=', 'TugasMandiri.IDPengguna')
        ->select('TugasMandiri.*', 'LembarJawabanTugasMandiri.*')
        ->ignore($request->id)
        ->get();
        
        $request->IDPengguna = DB::table('LembarJawabanTugasMandiri')
        ->join('Users', 'Users.id', '=', 'LembarJawabanTugasMandiri.IDPengguna')
        ->select('Users.*', 'LembarJawabanTugasMandiri.*')
        ->where('Users.PeranPengguna', '=', 'Siswa')
        ->orWhere(Auth::user()->PeranPengguna, '=', 'Siswa')
        ->ignore($request->id)
        ->get();

        $jawaban->id = $request->id;
        $IDJawaban = $jawaban->id;
        $dataJawaban = LembarJawabanTugasMandiri::findOrFail($IDJawaban);

        $namaBerkas = 'Jawaban-Tugas-Mandiri '.time().' oleh '.Auth::user()->NomorIndukPengguna.'-'.Auth::user()->NamaPertamaPengguna.' '.Auth::user()->NamaTerakhirPengguna.'-revisi.'.$request->file('BerkasLembarJawabanTugasMandiri')->extension();
        $lokasi = $request->file('BerkasLembarJawabanTugasMandiri')->storeAs('uploads/Lembar-Jawaban-Tugas-Mandiri/', $namaBerkas); 

        $jawaban->update([
            'JudulLembarJawabanTugasMandiri' => $request->JudulLembarJawabanTugasMandiri,
            'BerkasLembarJawabanTugasMandiri' => $request->BerkasLembarJawabanTugasMandiri,
            'IDTugasMandiri' => $request->IDTugasMandiri,
            'IDPengguna' => $request->IDPengguna
        ]);

        $jawaban->save();

        return redirect()->route('mata_pelajaran.tugas-mandiri')->with(['success'=>'Jawaban Tugas Mandiri berhasil diperbarui!']);
    }

    public function periksa(LembarJawabanTugasMandiri $jawaban){
        $jawaban->id = $request->id;
        $IDJawaban = $jawaban->id;
        $dataJawaban = LembarJawabanTugasMandiri::findOrFail($IDJawaban);

        if ($dataJawaban->hasFile('BerkasLembarJawabanTugasMandiri')) {
            $request->where('id', '<>', $request->id)->update([
                'NilaiTugasMandiri' => $request->NilaiTugasMandiri
            ]);
        }
        return redirect()->route('mata_pelajaran.periksa-jawaban-tugas-mandiri');
    }

    public function periksaJawaban(){
        return view('mata_pelajaran.periksa-jawaban-tugas-mandiri');
    }

}