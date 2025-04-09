<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Models\Guru;
use App\Models\Penilaian;
use Illuminate\Support\Facades\DB;
use Hash;
use Session;


class GuruController extends Controller
{
    public function __invoke(){
        //
    }

    public function index(){
        return view('dashboard');
    }

    public function periksaJawabanUjian(){
        return view('guru.periksa-jawaban-ujian');
    }

    public function biodataGuru(){
        return view('guru.profil-guru');
    }

    public function suntingProfilGuru(){
        return view('guru.sunting-profil-guru');
    }

    public function revisiProfilGuru(Request $request){
        // $request->validate([
        //     'NamaPertamaPengguna',
        //     'NamaTerakhirPengguna',
        //     'NomorIndukPengguna',
        //     'PeranPengguna',
        //     'SurelPengguna',
        //     'NomorPonselPengguna',
        //     'TanggalLahirPengguna',
        //     'TahunMasukPengguna',
        //     'MataPelajaran' => 'required | min: 3'->ignore($request->id),
        //     'MataPelajaran2' => 'min: 3'->ignore($request->id),
        //     'MataPelajaran3' => 'min: 3'->ignore($request->id),
        //     'MataPelajaran4' => 'min: 3'->ignore($request->id),
        //     'FotoProfilPengguna' => 'mimes: jpg, jpeg, png | max: 50000'->ignore($request->id)
        // ]);

        $id = Auth::user()->id;

        if($request->hasFile('FotoProfilPengguna')){
            if ($request->has('MataPelajaran')) {
                $namaBerkas= 'Foto Profil Guru '.$request->MataPelajaran.'-'.$request->NomorIndukPengguna.'-'.$request->NamaPertamaPengguna.' '.$request->NamaTerakhirPengguna.' pada tanggal '.time().'.'.$request->file->extension();

                $lokasi = $request->file('FotoProfilPengguna')->storeAs('uploads/Foto-Profil-Guru', $namaBerkas);

                $request->update([
                    'MataPelajaran'=>$request->MataPelajaran,
                    'MataPelajaran2'=>$request->MataPelajaran2,
                    'MataPelajaran3'=>$request->MataPelajaran3,
                    'MataPelajaran4'=>$request->MataPelajaran4,
                    'FotoProfilPengguna'=>$request->FotoProfilPengguna
                ]);
            }

            elseif ($request->has('MataPelajaran') AND $request->has('MataPelajaran2')) {
                $namaBerkas= 'Foto Profil Guru '.$request->MataPelajaran.' dan '.$request->MataPelajaran2.'-'.$request->NomorIndukPengguna.'-'.$request->NamaPertamaPengguna.' '.$request->NamaTerakhirPengguna.' pada tanggal '.time().'.'.$request->file->extension();

                $lokasi = $request->file('FotoProfilPengguna')->storeAs('uploads/Foto-Profil-Guru', $namaBerkas);

                $request->update([
                    'MataPelajaran'=>$request->MataPelajaran,
                    'MataPelajaran2'=>$request->MataPelajaran2,
                    'MataPelajaran3'=>$request->MataPelajaran3,
                    'MataPelajaran4'=>$request->MataPelajaran4,
                    'FotoProfilPengguna'=>$request->FotoProfilPengguna
                ]);
            }

            elseif ($request->has('MataPelajaran') AND $request->has('MataPelajaran3')) {
                $namaBerkas= 'Foto Profil Guru '.$request->MataPelajaran.' dan '.$request->MataPelajaran3.'-'.$request->NomorIndukPengguna.'-'.$request->NamaPertamaPengguna.' '.$request->NamaTerakhirPengguna.' pada tanggal '.time().'.'.$request->file->extension();

                $lokasi = $request->file('FotoProfilPengguna')->storeAs('uploads/Foto-Profil-Guru', $namaBerkas);

                $request->update([
                    'MataPelajaran'=>$request->MataPelajaran,
                    'MataPelajaran2'=>$request->MataPelajaran2,
                    'MataPelajaran3'=>$request->MataPelajaran3,
                    'MataPelajaran4'=>$request->MataPelajaran4,
                    'FotoProfilPengguna'=>$request->FotoProfilPengguna
                ]);
            }

            elseif ($request->has('MataPelajaran') AND $request->has('MataPelajaran4')) {
                $namaBerkas= 'Foto Profil Guru '.$request->MataPelajaran.' dan '.$request->MataPelajaran4.'-'.$request->NomorIndukPengguna.'-'.$request->NamaPertamaPengguna.' '.$request->NamaTerakhirPengguna.' pada tanggal '.time().'.'.$request->file->extension();

                $lokasi = $request->file('FotoProfilPengguna')->storeAs('uploads/Foto-Profil-Guru', $namaBerkas);

                $request->update([
                    'MataPelajaran'=>$request->MataPelajaran,
                    'MataPelajaran2'=>$request->MataPelajaran2,
                    'MataPelajaran3'=>$request->MataPelajaran3,
                    'MataPelajaran4'=>$request->MataPelajaran4,
                    'FotoProfilPengguna'=>$request->FotoProfilPengguna
                ]);
            }

            elseif ($request->has('MataPelajaran') AND $request->has('MataPelajaran2') AND $request->has('MataPelajaran3')) {
                $namaBerkas= 'Foto Profil Guru '.$request->MataPelajaran.', '.$request->MataPelajaran2.' dan '.$request->MataPelajaran3.'-'.$request->NomorIndukPengguna.'-'.$request->NamaPertamaPengguna.' '.$request->NamaTerakhirPengguna.' pada tanggal '.time().'.'.$request->file->extension();

                $lokasi = $request->file('FotoProfilPengguna')->storeAs('uploads/Foto-Profil-Guru', $namaBerkas);

                $request->update([
                    'MataPelajaran'=>$request->MataPelajaran,
                    'MataPelajaran2'=>$request->MataPelajaran2,
                    'MataPelajaran3'=>$request->MataPelajaran3,
                    'MataPelajaran4'=>$request->MataPelajaran4,
                    'FotoProfilPengguna'=>$request->FotoProfilPengguna
                ]);
            }

            elseif ($request->has('MataPelajaran') AND $request->has('MataPelajaran3') AND $request->has('MataPelajaran4')) {
                $namaBerkas= 'Foto Profil Guru '.$request->MataPelajaran.', '.$request->MataPelajaran3.' dan '.$request->MataPelajaran4.'-'.$request->NomorIndukPengguna.'-'.$request->NamaPertamaPengguna.' '.$request->NamaTerakhirPengguna.' pada tanggal '.time().'.'.$request->file->extension();

                $lokasi = $request->file('FotoProfilPengguna')->storeAs('uploads/Foto-Profil-Guru', $namaBerkas);

                $request->update([
                    'MataPelajaran'=>$request->MataPelajaran,
                    'MataPelajaran2'=>$request->MataPelajaran2,
                    'MataPelajaran3'=>$request->MataPelajaran3,
                    'MataPelajaran4'=>$request->MataPelajaran4,
                    'FotoProfilPengguna'=>$request->FotoProfilPengguna
                ]);
            }

            elseif ($request->has('MataPelajaran') AND $request->has('MataPelajaran2') AND $request->has('MataPelajaran3')
            AND $request->has('MataPelajaran4')) {
                $namaBerkas= 'Foto Profil Guru '.$request->MataPelajaran.', '.$request->MataPelajaran2.', '.$request->MataPelajaran3.' dan '.$request->MataPelajaran4.'-'.$request->NomorIndukPengguna.'-'.$request->NamaPertamaPengguna.' '.$request->NamaTerakhirPengguna.' pada tanggal '.time().'.'.$request->file->extension();

                $lokasi = $request->file('FotoProfilPengguna')->storeAs('uploads/Foto-Profil-Guru', $namaBerkas);

                $request->update([
                    'MataPelajaran'=>$request->MataPelajaran,
                    'MataPelajaran2'=>$request->MataPelajaran2,
                    'MataPelajaran3'=>$request->MataPelajaran3,
                    'MataPelajaran4'=>$request->MataPelajaran4,
                    'FotoProfilPengguna'=>$request->FotoProfilPengguna
                ]);
            }
        }
        else {
            $request->update([
                'MataPelajaran'=>$request->MataPelajaran,
                'MataPelajaran2'=>$request->MataPelajaran2,
                'MataPelajaran3'=>$request->MataPelajaran3,
                'MataPelajaran4'=>$request->MataPelajaran4
            ]);
        }

        $request->save();

        return redirect()->route('guru.profil-guru');
    }

    public function threadBaru(){
        return view('mata_pelajaran.thread-baru-guru');
    }

    public function tambahUlanganHarian(){
        return view('guru.ulangan-harian-baru');
    }

    public function mapel(){
        return view('guru.daftar-mata-pelajaran');
    }

    public function absensi(){
        return view('guru.absensi');
    }

    public function pengumuman(){
        return view('guru.pengumuman-khusus-guru');
    }

    public function jadwalKelas(){
        return view('guru.jadwal-khusus-guru');
    }

    public function inputNilaiAkhir(){
        return view('guru.input-nilai-akhir');
    }

    public function gantiKataSandi(){
        return view('guru.ganti-kata-sandi-guru');
    }

    public function inputPenilaian(Request $request){
        $nilai = new Penilaian();
        $nilai->NilaiKehadiran = $request->NilaiKehadiran;
        $nilai->NilaiTugasMandiri = $request->NilaiTugasMandiri;
        $nilai->NilaiAkhir = $request->NilaiAkhir;
        $nilai->NilaiAkhirDalamHuruf = $request->NilaiAkhirDalamHuruf;
        $nilai->NilaiUAS = $request->NilaiUAS;
        $nilai->NilaiUTS = $request->NilaiUTS;
        $nilai->NilaiUlanganHarian = $request->NilaiUlanganHarian;
        $nilai->IDUjian = $request->IDUjian;
        $nilai->IDPengguna = $request->IDPengguna;
        $nilai->IDKelas = $request->IDKelas;

        $request->IDUjian = DB::table('Penilaian')
        ->join('Ujian', 'Ujian.id', '=', 'Penilaian.IDUjian')
        ->select('Penilaian.*', 'Ujian.*')
        ->where('Ujian.JenisUjian', '=', 'UTS (Ujian Tengah Semester)')
        ->orWhere('Ujian.JenisUjian', '=', 'UAS (Ujian Akhir Semester)')
        ->get();

        $request->IDPengguna  = DB::table('Penilaian')
        ->join('Users', 'Users.id', '=', 'Penilaian.IDPengguna')
        ->select('Users.*', 'Penilaian.*')
        ->where('Users.PeranPengguna', '=', 'Siswa')
        ->limit(1)
        ->get();

        $namaKelas = DB::table('Kelas')
        ->join('Users', 'Users.id', '=', 'Kelas.IDPengguna')
        ->select('Kelas.NamaKelas')
        ->get();

        $request->IDKelas = DB::table('Penilaian')
        ->join('Kelas', 'Kelas.id' , '=', 'Penilaian.IDKelas')
        ->join('Users', 'Users.id', '=', 'Penilaian.IDPengguna')
        ->select('Users.*', 'Kelas.*')
        ->where('Users.KelasSiswa', 'in', $namaKelas)
        ->get();

        $nilai->save();

        return redirect()->route('guru.input-nilai-akhir')->with(['success' => 'Nilai Akhir berhasil dimasukkan!']);
    }

    public function pengawasanUjian(){
        return view('guru.pengawasan-ujian');
    }

    public function kelas(){
        return view('guru.kelas-guru');
    }

    public function obrolan(){
        return view('guru.obrolan-guru');
    }

    public function isiMateri(){
        return view('mata_pelajaran.isi-materi-guru');
    }
}
