<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\User;
use App\Models\Guru;
use App\Models\Daftar;
use App\Models\Admin;
use App\Models\Siswa;
use App\Models\Absensi;
use Illuminate\Support\Facades\DB;

class MateriController extends Controller
{
    public function index(Materi $materi){
        $IDMateri = $materi->id;
        $dataMateri = Materi::find($IDMateri);
        return view('mata_pelajaran.isi-materi-siswa', compact('dataMateri'));
    }

    public function lihatMateri(Materi $materi){
        $IDMateri = $materi->id;
        $dataMateri = Materi::find($IDMateri);
        return view('mata_pelajaran.isi-materi-siswa', compact('dataMateri'));
    }

    public function materiBaru(){
        return view('mata_pelajaran.tambah-materi');
    }

    public function kehadiranSiswa(Absensi $absensi, Materi $materi){
        $IDAbsensi = $absensi->id;
        $dataAbsensi = Absensi::find($IDAbsensi);
        $IDMateri = $materi->id;
        $dataMateri = Materi::find($IDMateri);
        return view('mata_pelajaran.isi-materi-siswa', compact('dataAbsensi'), compact('dataMateri'));
    }

    public function absensiSiswa(Request $request, Absensi $absensi, Materi $materi){
        $this->validate($request, [
            'StatusKehadiran' => 'required | boolean'
        ]);

        $IDAbsensi = $absensi->id;
        $dataAbsensi = Absensi::find($IDAbsensi);
        $IDMateri = $materi->id;
        $dataMateri = Materi::find($IDMateri);

        $request->update([
            'StatusKehadiran' => $request->StatusKehadiran
        ]);

        return redirect()->route('mata_pelajaran.isi-materi-siswa');
    }

    public function khususGuru(){
        return view('mata_pelajaran.isi-materi-guru');
    }

    public function inputMateri(Request $request){
        $materiBaru = new Materi();
        $materiBaru->JudulMateri = $request->JudulMateri;
        $materiBaru->KIdanKDMateri = $request->KIdanKDMateri;
        $materiBaru->BerkasMateri = $request->BerkasMateri;
        $materiBaru->KataKunci = $request->KataKunci;
        $materiBaru->TautanZOOM = $request->TautanZOOM;
        $materiBaru->PeruntukanKelas = $request->PeruntukanKelas;
        $materiBaru->IDMataPelajaran = $request->IDMataPelajaran;

        $peruntukanKelas = DB::table('MataPelajaran')
        ->select('PeruntukanKelas')
        ->get();

        $request->IDMataPelajaran = DB::table('Materi')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'Materi.IDMataPelajaran')
        ->select('MataPelajaran.*', 'Materi.*')
        ->where([
            [$request->PeruntukanKelas, '=', $peruntukanKelas],
            ['MataPelajaran.is_active', '=', 1],
        ])
        ->get();

        $this->validate($request, [
            'BerkasMateri' => 'required | mimes: pdf, ppt, doc, pptx, docx, docm, pptm | max:5000',
            'JudulMateri' => 'required | min: 5',
            'KIdanKDMateri' => 'required | min: 5',
            'KataKunci' => 'required |  min: 3',
            'PeruntukanKelas' => 'required | min: 3',
            'TautanZOOM' => 'url | regex:/\b(?:(?:https?|ftp):\/\/|zoom\.\us)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/g'
        ]);

        $namaBerkasMateri = 'Materi '.time().'-'.$request->JudulMateri.'.'.$request->file('BerkasMateri')->extension();

        $berkasMateri = $request->file('BerkasMateri')->storeAs('uploads/Berkas-Materi', $namaBerkasMateri);

        $materiBaru->save();

        return redirect()->route('mata_pelajaran.isi-materi-guru')->with(['success' => 'Materi berhasil ditambahkan!']);
    }

    public function suntingMateri(){
        return view('mata_pelajaran.sunting-materi');
    }

    public function revisiMateri(Request $request, Materi $materi){
        $this->validate($request,[
            'BerkasMateri' => 'mimes:pdf, pptx, pptm, doc, docx, docm, jpg, zip, rar, gz, 7z, ppt,
            jpeg, png| max:50000',
            'PeruntukanKelas' => 'min: 3',
            'JudulMateri' => 'min: 5',
            'KIdanKDMateri' => 'min: 5',
            'KataKunci' => 'min: 3',
            'TautanZOOM' => 'url | regex:/\b(?:(?:https?|ftp):\/\/|zoom\.\us)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/g'
        ]);

        $peruntukanKelas = DB::table('MataPelajaran')
        ->select('PeruntukanKelas')
        ->where('is_active', '=', 1)
        ->get();

        $request->IDMataPelajaran = DB::table('Materi')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'Materi.IDMataPelajaran')
        ->select('MataPelajaran.*', 'Materi.*')
        ->where($request->PeruntukanKelas, '=', $peruntukanKelas)
        ->get();

        $IDMateri = $materi->id;
        $dataMateri = Materi::findOrFail($IDMateri);

        $namaBerkasMateri = 'Materi '.time().'-'.$request->JudulMateri.'-revisi.'.$request->file('BerkasMateri')->extension();

        if ($request->hasFile('BerkasMateri')){
            $berkasMateriRevisi = $request->file('BerkasMateri')->storeAs('uploads/Materi', $namaBerkasMateri);

            $materiPembelajaran = $request->file('BerkasMateri');

            $materiPembelajaran->delete('uploads/Materi', $request->file('BerkasMateri'));

            $request->where('id', '<>', $request->id)->update([
                'BerkasMateri' => $berkasMateriRevisi,
                'TautanZOOM' => $request->TautanZOOM,
                'KataKunci' => $request->KataKunci,
                'KIdanKDMateri' => $request->KIdanKDMateri,
                'JudulMateri' => $request->JudulMateri,
                'PeruntukanKelas' => $request->PeruntukanKelas,
                'IDMataPelajaran' => $request->IDMataPelajaran
            ]);
        }
        else{
            // Jika tidak ada berkas materi
            $request->where('id', '<>', $request->id)->update([
                'TautanZOOM' => $request->TautanZOOM,
                'KataKunci' => $request->KataKunci,
                'KIdanKDMateri' => $request->KIdanKDMateri,
                'JudulMateri' => $request->JudulMateri,
                'PeruntukanKelas' => $request->PeruntukanKelas,
                'IDMataPelajaran' => $request->IDMataPelajaran
            ]);
        }
        return redirect()->route('guru.perbarui-materi', ['materiPembelajaran'])->with(['success' => 'Materi berhasil diperbarui!']);
    }

    // public function hapusMateri(Materi $materi){
    //     $IDMateri = $materi->id;
    //     $dataMateri = Materi::find($IDMateri);
    //     Materi::delete($dataMateri);
    //     $dataMateri->delete();
    //     return view('mata_pelajaran.isi-materi-guru', compact('dataMateri'))->with(['success' => 'Materi berhasil dihapus!']);
    // }
}
