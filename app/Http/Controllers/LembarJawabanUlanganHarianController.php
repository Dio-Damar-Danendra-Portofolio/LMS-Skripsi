<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LembarJawabanUlanganHarian;
use App\Models\UlanganHarian;
use App\Models\User;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use Illuminate\Support\Facades\DB;

class LembarJawabanUlanganHarianController extends Controller
{
    public function index(){
        return view('mata_pelajaran.ulangan-harian');
    }

    public function jawabanUlanganHarian(Request $request){
        $jawaban = new LembarJawabanUlanganHarian;
        $jawaban->JudulLembarJawabanUlanganHarian = $request->JudulLembarJawabanUlanganHarian;
        $jawaban->BerkasLembarJawabanUlanganHarian = $request->BerkasLembarJawabanUlanganHarian;
        $jawaban->NilaiUlanganHarian = $request->NilaiUlanganHarian;
        $jawaban->IDUlanganHarian = $request->IDUlanganHarian;
        $jawaban->IDPengguna = $request->IDPengguna;

        $kelas = DB::table('Kelas')
        ->select('NamaKelas')
        ->get();

        $request->IDUlanganHarian = DB::table('LembarJawabanUlanganHarian')
        ->join('UlanganHarian', 'UlanganHarian.id', '=', 'LembarJawabanUlanganHarian.IDUlanganHarian')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'UlanganHarian.IDMataPelajaran')
        ->join('Materi', 'Materi.id', '=', 'UlanganHarian.IDMateri')
        ->join('Kelas', 'Kelas.id', '=', 'UlanganHarian.IDKelas')
        ->select('Kelas.*', 'UlanganHarian.*', 'LembarJawabanUlanganHarian.*')
        ->where('MataPelajaran.PeruntukanKelas', '=', $kelas)
        ->where('Materi.PeruntukanKelas', '=', $kelas)
        ->get();

        $request->IDPengguna = DB::table('LembarJawabanUlanganHarian')
        ->join('UlanganHarian', 'UlanganHarian.id', '=', 'LembarJawabanUlanganHarian.IDUlanganHarian')
        ->join('Kelas', 'Kelas.id', '=', 'UlanganHarian.IDKelas')
        ->join('Users', 'Users.id', '=', 'LembarJawabanUlanganHarian.IDPengguna')
        ->select('Users.*', 'Kelas.*', 'UlanganHarian.*', 'LembarJawabanUlanganHarian.*')
        ->where([
            ['Users.PeranPengguna', '=', 'Siswa'],
            ['Users.KelasSiswa', '=', $kelas]
        ])
        ->orWhere([
            [Auth::user()->PeranPengguna, '=', 'Siswa'],
            [Auth::user()->KelasSiswa, '=', $kelas]
        ])
        ->get();

        $request->validate([
            'JudulLembarJawabanUlanganHarian' => 'required | min: 5',
            'BerkasLembarJawabanUlanganHarian' => 'required | mimes: pdf, docx, doc, docm, zip, rar, 7z, gz | max: 5000'
        ]);

        $namaBerkas = 'Jawaban Ulangan Harian '.time().' oleh '.Auth::user()->NomorIndukPengguna.'-'.Auth::user()->NamaPertamaPengguna.' '.Auth::user()->NamaTerakhirPengguna.'.'.$request->file('BerkasLembarJawabanUlanganHarian')->extension();
        $lokasi = $request->file('BerkasLembarJawabanUlanganHarian')->storeAs('uploads/Lembar-Jawaban-Ulangan-Harian/', $namaBerkas);

        $jawaban->save();

        return redirect()->route('mata_pelajaran.ulangan-harian')->with(['status' => 'Jawaban Ulangan Harian berhasil dikirim!']);
    }

    public function suntingJawaban(LembarJawabanUlanganHarian $jawaban){
        $IDJawaban = $jawaban->id;
        $dataJawaban = LembarJawabanUlanganHarian::findOrFail($IDJawaban);
        return view('mata_pelajaran.ulangan-harian', compact('dataJawaban'));
    }

    public function revisiJawaban(Request $request, LembarJawabanUlanganHarian $jawaban){
        $kelas = DB::table('Kelas')
        ->select('NamaKelas')
        ->get();

        $request->IDUlanganHarian = DB::table('LembarJawabanUlanganHarian')
        ->join('UlanganHarian', 'UlanganHarian.id', '=', 'LembarJawabanUlanganHarian.IDUlanganHarian')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'UlanganHarian.IDMataPelajaran')
        ->join('Materi', 'Materi.id', '=', 'UlanganHarian.IDMateri')
        ->join('Kelas', 'Kelas.id', '=', 'UlanganHarian.IDKelas')
        ->select('Kelas.*', 'UlanganHarian.*', 'LembarJawabanUlanganHarian.*')
        ->where('MataPelajaran.PeruntukanKelas', '=', $kelas)
        ->where('Materi.PeruntukanKelas', '=', $kelas)
        ->get();

        $request->IDPengguna = DB::table('LembarJawabanUlanganHarian')
        ->join('UlanganHarian', 'UlanganHarian.id', '=', 'LembarJawabanUlanganHarian.IDUlanganHarian')
        ->join('Kelas', 'Kelas.id', '=', 'UlanganHarian.IDKelas')
        ->join('Users', 'Users.id', '=', 'LembarJawabanUlanganHarian.IDPengguna')
        ->select('Users.*', 'Kelas.*', 'UlanganHarian.*', 'LembarJawabanUlanganHarian.*')
        ->where([
            ['Users.PeranPengguna', '=', 'Siswa'],
            ['Users.KelasSiswa', '=', $kelas]
        ])
        ->orWhere([
            [Auth::user()->PeranPengguna, '=', 'Siswa'],
            [Auth::user()->KelasSiswa, '=', $kelas]
        ])
        ->get();

        $request->validate([
            'JudulLembarJawabanUlanganHarian' => 'required | min: 5' ,
            'BerkasLembarJawabanUlanganHarian' => 'required | mimes: pdf, docx, doc, docm, zip, rar, 
            7z, gz | max: 5000'
        ]);

        $jawaban->id = $request->id;
        $IDJawaban = $jawaban->id;
        $dataJawaban = LembarJawabanUlanganHarian::findOrFail($IDJawaban);

        if($dataJawaban->hasFile('BerkasLembarJawabanUlanganHarian')){
            $request->where('id', '<>', $request->id)->update([
                'JudulLembarJawabanUlanganHarian' => $request->JudulLembarJawabanUlanganHarian,
                'BerkasLembarJawabanUlanganHarian' => $request->BerkasLembarJawabanUlanganHarian,
                'IDUlanganHarian' => $request->IDUlanganHarian,
                'IDPengguna' => $request-> IDPengguna
            ]);
        }

        else {
            $request->where('id', '<>', $request->id)->update([
                'JudulLembarJawabanUlanganHarian' => $request->JudulLembarJawabanUlanganHarian,
                'IDUlanganHarian' => $request->IDUlanganHarian,
                'IDPengguna' => $request-> IDPengguna
            ]);
        }

        return redirect()->route('mata_pelajaran.ulangan-harian')->with(['status' => 'Jawaban Ulangan Harian berhasil diperbarui!']);
    }

    public function periksa(LembarJawabanUlanganHarian $jawaban){
        $jawaban->id = $request->id;
        $IDJawaban = $jawaban->id;
        $dataJawaban = LembarJawabanUlanganHarian::findOrFail($IDJawaban);

        if ($dataJawaban->hasFile('BerkasLembarJawabanUlanganHarian')) {
            $request->where('id', '<>', $request->id)->update([
                'NilaiUlanganHarian' => $request->NilaiUlanganHarian
            ]);
        }
        return redirect()->route('mata_pelajaran.periksa-jawaban-ulangan-harian');
    }
}
