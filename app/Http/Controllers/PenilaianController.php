<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Daftar;
use App\Models\Ujian;
use App\Models\TugasMandiri;
use App\Models\Penilaian;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{

    public function __invoke(){

    }
    
    public function index()
    {
        return view('guru.input-nilai-akhir');
    }

    public function laporanNilaiAkhirkhususSiswa(){
        return view('siswa.laporan-nilai-akhir');
    }

    public function laporanNilaiAkhirkhususGuru(){
        return view('guru.nilai-akhir-siswa');
    }

    public function penilaianSiswa(){
        return view('guru.penilaian-siswa');
    }

    public function cariNilaiAkhirBerdasarkanSemester(Request $request){
        $pengguna = Auth::user()->PeranPengguna;

        $siswa = Auth::user()->id
        ->where('is_active', 1)
        ->where($pengguna, '=', 'Siswa')
        ->get();
        
        $cari->Semester = $request->Semester;
        $cari->PencarianKelas = $request->PencarianKelas;
        $cari->save();

        if ($request->has(['Semester', 'PencarianKelas'])) {
            $data = $request->join('Penilaian', 'Users.id', '=', 'Penilaian.IDPengguna')
            ->select('Penilaian.*', 'Users.*')
            ->where(Auth::user()->PeranPengguna, '=', 'Siswa')
            ->where('Users.KelasSiswa', '=', $request->PencarianKelas)
            ->where($request->Semester, '=', 'Penilaian.Semester')
            ->get();

            return view('siswa.laporan-nilai-akhir-siswa', [$data]);
        }

        else {
            return view('siswa.laporan-nilai-akhir-siswa');
        }
        
    }

    public function hitungNilaiAkhir(){
        return view('guru.input-nilai-akhir');
    }

    public function laporanNilaiAkhir(){
        return view('guru.laporan-nilai-akhir');
    }

    public function nilai(){
        return view('guru.nilai-mapel');
    }

    public function inputNilai(Request $request){
        $nilaiSiswa = new Penilaian();
        $nilaiSiswa->IDUjian = $request->IDUjian;
        $nilaiSiswa->IDPengguna = $request->IDPengguna;
        $nilaiSiswa->IDKelas  = $request->IDKelas;
        $nilaiSiswa->IDMataPelajaran = $request->IDMataPelajaran;
        $nilaiSiswa->NilaiAkhir = $request->NilaiAkhir;
        $nilaiSiswa->NilaiAkhirDalamHuruf = $request->NilaiAkhirDalamHuruf;
        $nilaiSiswa->NilaiUAS = $request->NilaiUAS;
        $nilaiSiswa->NilaiUTS = $request->NilaiUTS;
        $nilaiSiswa->NilaiTugasMandiri = $request->NilaiTugasMandiri;
        $nilaiSiswa->NilaiKehadiran = $request->NilaiKehadiran;
        $nilaiSiswa->NilaiUlanganHarian = $request->NilaiUlanganHarian;

        $request->validate([
            'NilaiAkhir' => 'required',
            'NilaiAkhirDalamHuruf' => 'required',
            'NilaiUAS' => 'required',
            'NilaiUTS' => 'required',
            'NilaiTugasMandiri' => 'required',
            'NilaiKehadiran' => 'required',
            'NilaiUlanganHarian' => 'required'
        ]);

        $kelas = DB::table('Kelas')
        ->select('NamaKelas')
        ->get();

        $kelasSiswa = DB::table('Kelas')
        ->join('Users', 'Users.id', '=', 'Kelas.IDPengguna')
        ->select('Users.*', 'Kelas.*')
        ->where('Users.PeranPengguna', '=', 'Siswa')
        ->where('Users.KelasSiswa', '=', $kelas)
        ->get();

        $request->IDUjian = DB::table('Penilaian')
        ->join('Ujian', 'Ujian.id', '=', 'Penilaian.IDUjian')
        ->select('Ujian.*', 'Penilaian.*')
        ->where('Ujian.JenisUjian', 'like', '%UTS%')
        ->orWhere('Ujian.JenisUjian', 'like', '%UAS%')
        ->get();

        $request->IDPengguna = DB::table('Penilaian')
        ->join('Users', 'Users.id', '=', 'Penilaian.IDPengguna')
        ->select('Users.*', 'Penilaian.*')
        ->where(function(Builder $query){
                $query->where('Users.PeranPengguna', '=', 'Siswa')
                ->where('Users.KelasSiswa', '=', $kelas);
        })
        ->orWhere(function(Builder $query){
            $query->where(Auth::user()->PeranPengguna, '=', 'Siswa')
                ->where(Auth::user()->KelasSiswa, '=', $kelas);
        })
        ->get();

        $request->IDKelas = DB::table('Penilaian')
        ->join('Kelas', 'Kelas.id', '=', 'Penilaian.IDKelas')
        ->join('Users', 'Users.id', '=', 'Penilaian.IDPengguna')
        ->select('Penilaian.*', 'Kelas.*', 'Users.*')
        ->where(function(Builder $query){
            $query->where('Users.PeranPengguna', '=', 'Siswa')
            ->where('Users.KelasSiswa', '=', $kelas);
        })
        ->orWhere(function(Builder $query){
            $query->where(Auth::user()->PeranPengguna, '=', 'Siswa')
            ->where(Auth::user()->KelasSiswa, '=', $kelas);
        })
        ->get();

        $request->IDMataPelajaran = DB::table('Penilaian')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'Penilaian.IDMataPelajaran')
        ->join('Kelas', 'Kelas.id', '=', 'MataPelajaran.IDKelas')
        ->select('MataPelajaran.*', 'Penilaian.*')
        ->where(function(Builder $query){
                $query->where('MataPelajaran.PeruntukanKelas', '=', $kelas)
                ->orWhere('MataPelajaran.PeruntukanKelas', '=', $kelasSiswa);
        })
        ->get();

        $nilaiSiswa->save();

        return redirect()->route('guru.penilaian-siswa')->with(['status'=>'Nilai Akhir berhasil dimasukkan!']);
    }

    public function inputUlangNilai(Penilaian $penilaian){
        $IDPenilaian = $penilaian->id;
        $dataPenilaian = Penilaian::findOrFail($IDPenilaian);
        return view('guru.input-nilai-akhir', compact('dataPenilaian'));
    }

    public function revisiNilai(Request $request, $IDPenilaian){
        $request->validate([
            'NilaiAkhir' => 'required',
            'NilaiAkhirDalamHuruf' => 'required',
            'NilaiUAS' => 'required',
            'NilaiUTS' => 'required',
            'NilaiTugasMandiri' => 'required',
            'NilaiKehadiran' => 'required',
            'NilaiUlanganHarian' => 'required'
        ]);

        $request->IDUjian = DB::table('Penilaian')
        ->join('Ujian', 'Ujian.id', '=', 'Penilaian.IDUjian')
        ->select('Ujian.*', 'Penilaian.*')
        ->where('Ujian.JenisUjian', 'like', 'UTS')
        ->orWhere('Ujian.JenisUjian', 'like', 'UAS')
        ->ignore($request->id)
        ->get();

        $request->IDPengguna = DB::table('Penilaian')
        ->join('Users', 'Users.id', '=', 'Penilaian.IDPengguna')
        ->select('Users.*', 'Penilaian.*')
        ->where(function(Builder $query){
                $query->where('Users.PeranPengguna', '=', 'Siswa')
                ->where('Users.KelasSiswa', '=', $kelas);
        })
        ->orWhere(function(Builder $query){
            $query->where(Auth::user()->PeranPengguna, '=', 'Siswa')
                ->where(Auth::user()->KelasSiswa, '=', $kelas);
        })
        ->ignore($request->id)
        ->get();

        $request->IDKelas = DB::table('Penilaian')
        ->join('Kelas', 'Kelas.id', '=', 'Penilaian.IDKelas')
        ->join('Users', 'Users.id', '=', 'Penilaian.IDPengguna')
        ->select('Penilaian.*', 'Kelas.*', 'Users.*')
        ->where(function(Builder $query){
            $query->where('Users.PeranPengguna', '=', 'Siswa')
            ->where('Users.KelasSiswa', '=', $kelas);
        })
        ->orWhere(function(Builder $query){
            $query->where(Auth::user()->PeranPengguna, '=', 'Siswa')
            ->where(Auth::user()->KelasSiswa, '=', $kelas);
        })
        ->ignore($request->id)
        ->get();

        $request->IDMataPelajaran = DB::table('Penilaian')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'Penilaian.IDMataPelajaran')
        ->join('Kelas', 'Kelas.id', '=', 'MataPelajaran.IDKelas')
        ->select('MataPelajaran.*', 'Penilaian.*')
        ->where(function(Builder $query){
                $query->where('MataPelajaran.PeruntukanKelas', '=', $kelas)
                ->orWhere('MataPelajaran.PeruntukanKelas', '=', $kelasSiswa);
        })
        ->ignore($request->id)
        ->get();

        $dataPenilaian = Penilaian::findOrFail($IDPenilaian);

        $nilaiAkhir->update([
            'NilaiAkhir' => $request->NilaiAkhir,
            'NilaiAkhirDalamHuruf' => $request->NilaiAkhirDalamHuruf,
            'NilaiUAS' => $request->NilaiUAS,
            'NilaiUTS' => $request->NilaiUTS,
            'NilaiTugasMandiri' => $request->NilaiTugasMandiri,
            'NilaiKehadiran' => $request->NilaiKehadiran,
            'IDUjian' => $request->IDUjian,
            'IDPengguna' => $request->IDPengguna,
            'IDKelas' => $request->IDKelas,
            'IDMataPelajaran' => $request->IDMataPelajaran
        ]);

        return redirect()->route('guru.nilai-akhir', compact('dataPenilaian'))->with(['status' => 'Nilai Akhir berhasil direvisi']);
    }

    public function mapelKelompokA(){
        $kelas = DB::table('Kelas')
        ->select('NamaKelas')
        ->get();

        $kelasSiswa = DB::table('Kelas')
        ->join('Users', 'Users.id', '=', 'Kelas.IDPengguna')
        ->select('Users.*', 'Kelas.*')
        ->where('Users.PeranPengguna', '=', 'Siswa')
        ->where('Users.KelasSiswa', '=', $kelas)
        ->get();

        $penilaian = DB::table('Penilaian')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'Penilaian.IDMataPelajaran')
        ->join('Kelas', 'Kelas.id', '=', 'Penilaian.IDKelas')
        ->join('Users', 'Users.id', '=', 'Kelas.IDPengguna')
        ->join('Users', 'Users.id', '=', 'MataPelajaran.IDPengguna') 
        ->select('MataPelajaran.*', 'Kelas.*', 'Penilaian.*', 'Users.*')
        ->where(function(Builder $query){
            $query->where('MataPelajaran.KelompokMataPelajaran', '=', 'A')
            ->where('MataPelajaran.PeruntukanKelas', '=', $kelas)
            ->where('Penilaian.PeruntukanKelas', '=', $kelas)
            ->where('Users.KelasSiswa', '=', $kelasSiswa)
            ->where('Users.PeranPengguna', '=', 'Siswa')
            ->where('Kelas.is_active', '=', 1)
            ->where('Users.Semester', '=', Auth::user()->Semester);
        })
        ->get();
        return view('guru.nilai-akhir', ['penilaian' => $penilaian]);
    }

    public function mapelKelompokB(){
        $kelas = DB::table('Kelas')
        ->select('NamaKelas')
        ->get();

        $kelasSiswa = DB::table('Kelas')
        ->join('Users', 'Users.id', '=', 'Kelas.IDPengguna')
        ->select('Users.*', 'Kelas.*')
        ->where('Users.PeranPengguna', '=', 'Siswa')
        ->where('Users.KelasSiswa', '=', $kelas)
        ->get();

        $penilaian = DB::table('Penilaian')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'Penilaian.IDMataPelajaran')
        ->join('Kelas', 'Kelas.id', '=', 'Penilaian.IDKelas')
        ->join('Users', 'Users.id', '=', 'Kelas.IDPengguna')
        ->join('Users', 'Users.id', '=', 'MataPelajaran.IDPengguna') 
        ->select('MataPelajaran.*', 'Kelas.*', 'Penilaian.*', 'Users.*')
        ->where(function(Builder $query){
            $query->where('MataPelajaran.KelompokMataPelajaran', '=', 'B')
            ->where('MataPelajaran.PeruntukanKelas', '=', $kelas)
            ->where('Penilaian.PeruntukanKelas', '=', $kelas)
            ->where('Users.KelasSiswa', '=', $kelasSiswa)
            ->where('Users.PeranPengguna', '=', 'Siswa')
            ->where('Kelas.is_active', '=', 1)
            ->where('Users.Semester', '=', Auth::user()->Semester);
        })
        ->get();

        return view('guru.nilai-akhir', ['penilaian' => $penilaian]);
    }

    public function mapelKelompokC(){
        $kelas = DB::table('Kelas')
        ->select('NamaKelas')
        ->get();

        $kelasSiswa = DB::table('Kelas')
        ->join('Users', 'Users.id', '=', 'Kelas.IDPengguna')
        ->select('Users.*', 'Kelas.*')
        ->where('Users.PeranPengguna', '=', 'Siswa')
        ->where('Users.KelasSiswa', '=', $kelas)
        ->get();

        $penilaian = DB::table('Penilaian')
        ->join('MataPelajaran', 'MataPelajaran.id', '=', 'Penilaian.IDMataPelajaran')
        ->join('Kelas', 'Kelas.id', '=', 'Penilaian.IDKelas')
        ->join('Users', 'Users.id', '=', 'Kelas.IDPengguna')
        ->join('Users', 'Users.id', '=', 'MataPelajaran.IDPengguna') 
        ->select('MataPelajaran.*', 'Kelas.*', 'Penilaian.*', 'Users.*')
        ->where(function(Builder $query){
            $query->where('MataPelajaran.KelompokMataPelajaran', '=', 'C')
            ->where('MataPelajaran.PeruntukanKelas', '=', $kelas)
            ->where('Penilaian.PeruntukanKelas', '=', $kelas)
            ->where('Users.KelasSiswa', '=', $kelasSiswa)
            ->where('Users.PeranPengguna', '=', 'Siswa')
            ->where('Kelas.is_active', '=', 1)
            ->where('Users.Semester', '=', Auth::user()->Semester);
        })
        ->get();

        return view('guru.nilai-akhir', ['penilaian' => $penilaian]);
    }
}