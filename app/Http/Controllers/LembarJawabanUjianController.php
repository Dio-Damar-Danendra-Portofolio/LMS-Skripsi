<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LembarJawabanUjian;
use App\Models\User;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use Illuminate\Support\Facades\DB;

class LembarJawabanUjianController extends Controller
{
    public function index(){
        return view('siswa.ujian-siswa');
    }

    public function jawabanBaru(Request $request){
        $jawaban = new LembarJawabanUjian();
        $jawaban->JudulLembarJawabanUjian = $request->JudulLembarJawabanUjian;
        $jawaban->BerkasLembarJawabanUjian = $request->BerkasLembarJawabanUjian;
        $jawaban->NilaiUjian = $request->NilaiUjian;
        $jawaban->IDUjian = $request->IDUjian;
        $jawaban->IDPengguna = $request->IDPengguna;

        $request->IDUjian = DB::table('LembarJawabanUjian')
        ->join('Ujian', 'Ujian.id', '=', 'LembarJawabanUjian.IDUjian')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'Ujian.IDMataPelajaran')
        ->join('Kelas', 'Kelas.id', '=', 'Ujian.IDKelas')
        ->select('Ujian.*', 'LembarJawabanUjian.*')
        ->where('Ujian.is_active', '=', true)
        ->get();

        $request->IDPengguna = DB::table('LembarJawabanUjian')
        ->join('Ujian', 'Ujian.id', '=', 'LembarJawabanUjian.IDUjian')
        ->join('Users', 'Users.id', '=', 'Ujian.IDPengguna')
        ->join('Users', 'Users.id', '=', 'LembarJawabanUjian.IDPengguna')
        ->select('Users.*', 'LembarJawabanUjian.*', 'Ujian.*')
        ->where('Users.PeranPengguna', '=', 'Siswa')
        ->orWhere(Auth::user()->PeranPengguna, '=', 'Siswa')
        ->get();

        $namaBerkas = 'Jawaban Ujian '.time().' oleh '.Auth::user()->NomorIndukPengguna.'-'.Auth::user()->NamaPertamaPengguna.' '.Auth::user()->NamaTerakhirPengguna.'.'.$request->file('BerkasLembarJawabanUjian')->extension();
        $lokasi = $request->file('BerkasLembarJawabanUjian')->storeAs('uploads/Lembar-Jawaban-Ujian/', $namaBerkas);

        $request->validate([
            'JudulLembarJawabanUjian' => 'required | min: 5',
            'BerkasLembarJawabanUjian' => 'required | mimes: pdf, docx, doc, docm, zip, rar, 7z, gz | max: 5000',
            'NilaiUjian' => 'nullable | float'
        ]);

        $jawaban->save();

        return redirect()->route('siswa.ujian-siswa')->with(['success' => 'Jawaban Ujian ber']);
    }

    public function suntingJawabanUjian(LembarJawabanUjian $jawaban){
        $IDJawaban = $jawaban->id;
        $dataJawaban = LembarJawabanUjian::findOrFail($IDJawaban);
        return view('siswa.ujian-siswa', compact('dataJawaban'));
    }

    public function revisiJawabanUjian(Request $request, LembarJawabanUjian $jawaban){
        $this->validate($request, [
            'JudulLembarJawabanUjian' => 'required | min: 5',
            'BerkasLembarJawabanUjian' => 'required | mimes: pdf, docx, doc, docm, zip, rar, 7z, gz 
            | max: 5000'
        ]);

        $request->IDUjian = DB::table('LembarJawabanUjian')
        ->join('Ujian', 'Ujian.id', '=', 'LembarJawabanUjian.IDUjian')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'Ujian.IDMataPelajaran')
        ->join('Kelas', 'Kelas.id', '=', 'Ujian.IDKelas')
        ->select('Ujian.*', 'LembarJawabanUjian.*')
        ->where('Ujian.is_active', '=', 1)
        ->get();

        $request->IDPengguna = DB::table('LembarJawabanUjian')
        ->join('Ujian', 'Ujian.id', '=', 'LembarJawabanUjian.IDUjian')
        ->join('Users', 'Users.id', '=', 'Ujian.IDPengguna')
        ->join('Users', 'Users.id', '=', 'LembarJawabanUjian.IDPengguna')
        ->select('Users.*', 'LembarJawabanUjian.*', 'Ujian.*')
        ->where('Users.PeranPengguna', '=', 'Siswa')
        ->orWhere(Auth::user()->PeranPengguna, '=', 'Siswa')
        ->get();

        $namaBerkas = 'Jawaban-Ujian '.time().' oleh '.Auth::user()->NomorIndukPengguna.'-'.Auth::user()->NamaPertamaPengguna.' '.Auth::user()->NamaTerakhirPengguna.'-revisi.'.$request->file('BerkasLembarJawabanUjian')->extension();
        $lokasi = $request->file('BerkasLembarJawabanUjian')->storeAs('uploads/Lembar-Jawaban-Ujian/', $namaBerkas);

        $IDJawaban = $jawaban->id;
        $dataJawaban = LembarJawabanUjian::findOrFail($IDJawaban);

        $request->where('id', '<>', $request->id)->update([
            'JudulLembarJawabanUjian' => $request->JudulLembarJawabanUjian,
            'BerkasLembarJawabanUjian' => $request->BerkasLembarJawabanUjian,
            'IDUjian' => $request->IDUjian,
            'IDPengguna' => $request->IDPengguna
        ]);

        $jawaban->save();

        return redirect()->route('siswa.ujian-siswa', compact('dataJawaban'))->with(['success'=>'Jawaban Ujian berhasil diperbarui!']);
    }

    public function periksa(LembarJawabanUjian $jawaban){
        $jawaban->id = $request->id;
        $IDJawaban = $jawaban->id;
        $dataJawaban = LembarJawabanUjian::findOrFail($IDJawaban);

        if ($dataJawaban->hasFile('BerkasLembarJawabanUjian')) {
            $request->where('id', '<>', $request->id)->update([
                'NilaiUjian' => $request->NilaiUjian
            ]);
        }
        return redirect()->route('mata_pelajaran.periksa-jawaban-ujian');
    }

    public function periksaJawaban(){
        return view('mata_pelajaran.periksa-jawaban-ujian');
    }
}
