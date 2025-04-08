<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalKelas;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Guru;
use App\Models\Admin;
use App\Models\Siswa;

class JadwalKelasController extends Controller
{

    public function __invoke(){
        
    }

    public function index(){
        return view('siswa.jadwal-kelas-bagi-siswa');
    }

    public function jadwalBaru(){
        return view('admin.tambah-jadwal-kelas');
    }

    public function inputJadwalKelas(Request $request){
        $jadwal = new JadwalKelas();
        $jadwal->WaktuPertemuan = $request->WaktuPertemuan;
        $jadwal->JenisPertemuan = $request->JenisPertemuan;
        $jadwal->RuangBelajar = $request->RuangBelajar;
        $jadwal->PeruntukanKelas = $request->PeruntukanKelas;
        $jadwal->MataPelajaran = $request->MataPelajaran;
        $jadwal->NamaGuru = $request->NamaGuru;
        $jadwal->Semester = $request->Semester;
        $jadwal->IDKelas = $request->IDKelas;
        $jadwal->IDMataPelajaran = $request->IDMataPelajaran;
        $jadwal->IDPengguna = $request->IDPengguna;

        $mapel = MataPelajaran::join('Users', 'MataPelajaran.IDPengguna', '=', 'Users.id')
        ->select('MataPelajaran.*', 'Users.*')
        ->where([
            ['Users.PeranPengguna', '=', 'Guru'],
            ['Users.MataPelajaran', '=', $request->MataPelajaran]
        ])
        ->orWhere(function (Builder $query){
            $query->where('Users.PeranPengguna', '=', 'Guru')
            ->where('Users.MataPelajaran2', '=', $request->MataPelajaran);
        })
        ->orWhere(function (Builder $query){
            $query->where('Users.PeranPengguna', '=', 'Guru')
            ->where('Users.MataPelajaran3', '=', $request->MataPelajaran);
        })
        ->orWhere(function (Builder $query){
            $query->where('Users.PeranPengguna', '=', 'Guru')
            ->where('Users.MataPelajaran4', '=', $request->MataPelajaran);
        })
        ->get();

        $request->IDKelas = JadwalKelas::join('Kelas', 'Kelas.id', '=', 'JadwalKelas.IDKelas')
        ->select('Kelas.*', 'JadwalKelas.*')
        ->where('Kelas.NamaKelas', 'like', $request->PeruntukanKelas)
        ->get();

        $request->IDMataPelajaran = JadwalKelas::join('MataPelajaran', 'MataPelajaran.id', '=', 'JadwalKelas.IDMataPelajaran')
        ->join('Users', 'Users.id', '=', 'MataPelajaran.IDPengguna')
        ->select('JadwalKelas.*', 'MataPelajaran.*')
        ->where('MataPelajaran.PeruntukanKelas', 'like', $request->PeruntukanKelas)
        ->orWhere('MataPelajaran.NamaMataPelajaran', 'like', $request->MataPelajaran)
        ->orWhere('MataPelajaran.NamaMataPelajaran', 'like', $mapel)
        ->get();

        $namaGuru = User::select(DB::raw('CONCAT(NamaPertamaPengguna, NamaTerakhirPengguna) as NamaLengkap'))
        ->where('PeranPengguna', '=', 'Guru')
        ->get();

        $request->IDPengguna = JadwalKelas::join('Users', 'Users.id', '=', 'JadwalKelas.IDPengguna')
        ->join('MataPelajaran', 'Users.id', '=', 'MataPelajaran.IDPengguna')
        ->select('JadwalKelas.*', 'MataPelajaran.*', 'Users.*')
        ->where([
            ['Users.PeranPengguna', '=', 'Guru'],
            ['Users.MataPelajaran', '=', $mapel],
            ['MataPelajaran.NamaGuru', '=', $namaGuru]
        ])
        ->orWhere([
            ['Users.PeranPengguna', '=', 'Guru'],
            ['Users.MataPelajaran2', '=', $mapel],
            ['MataPelajaran.NamaGuru', '=', $namaGuru]
        ])
        ->orWhere([
            ['Users.PeranPengguna', '=', 'Guru'],
            ['Users.MataPelajaran3', '=', $mapel],
            ['MataPelajaran.NamaGuru', '=', $namaGuru]
        ])
        ->orWhere([
            ['Users.PeranPengguna', '=', 'Guru'],
            ['Users.MataPelajaran4', '=', $mapel],
            ['MataPelajaran.NamaGuru', '=', $namaGuru]
        ])
        ->get();

        $request->validate([
            'WaktuPertemuan' => 'required',
            'JenisPertemuan' => 'required | min: 4 ',
            'RuangBelajar' => 'required | min: 4',
            'PeruntukanKelas' => 'required | min: 5',
            'MataPelajaran' => 'required | min: 3',
            'NamaGuru' => 'required'
        ]);

        $jadwal->save();

        return redirect()->route('admin.pengelola-jadwal')->with(['success'=>'Jadwal Kelas berhasil dimasukkan!']);
    }

    public function editJadwalKelas(JadwalKelas $jadwal){
        $IDJadwalKelas = $jadwal->id;
        $dataJadwalKelas = JadwalKelas::findOrFail($IDJadwalKelas);
        return view('admin.sunting-jadwal', compact('dataJadwalKelas'));
    }

    public function suntingJadwalKelas(Request $request, JadwalKelas $jadwal){
        $request->validate([
            'WaktuPertemuan' => 'required'->ignore($request->id),
            'JenisPertemuan' => 'required | min: 4'->ignore($request->id),
            'RuangBelajar' => 'required | min: 4'->ignore($request->id),
            'PeruntukanKelas' => 'required | min: 5'->ignore($request->id),
            'MataPelajaran' => 'required | min: 3'->ignore($request->id),
            'NamaGuru' => 'required'->ignore($request->id)
        ]);

        $mapel = MataPelajaran::join('Users', 'Users.id', '=', 'MataPelajaran.IDPengguna')
        ->select('MataPelajaran.*', 'Users.*')
        ->where([
            ['Users.PeranPengguna', '=', 'Guru'],
            ['Users.MataPelajaran', '=', $request->MataPelajaran]
        ])
        ->orWhere(
            ['Users.PeranPengguna', '=', 'Guru'],
            ['Users.MataPelajaran2', '=', $request->MataPelajaran]
        )
        ->orWhere(function (Builder $query){
            $query->where('Users.PeranPengguna', '=', 'Guru')
            ->where('Users.MataPelajaran3', '=', $request->MataPelajaran);
        })
        ->orWhere(function (Builder $query){
            $query->where('Users.PeranPengguna', '=', 'Guru')
            ->where('Users.MataPelajaran4', '=', $request->MataPelajaran);
        })
        ->get()
        ->ignore($request->id);

        $request->IDKelas = JadwalKelas::join('Kelas', 'Kelas.id', '=', 'JadwalKelas.IDKelas')
        ->select('Kelas.*', 'JadwalKelas.*')
        ->where('Kelas.NamaKelas', 'like', $request->PeruntukanKelas)
        ->get()
        ->ignore($request->id);

        $request->IDMataPelajaran = JadwalKelas::join('MataPelajaran', 'MataPelajaran.id', '=', 'JadwalKelas.IDMataPelajaran')
        ->select('JadwalKelas.*', 'MataPelajaran.*')
        ->where([
            ['MataPelajaran.PeruntukanKelas', 'like', $request->PeruntukanKelas],
            ['MataPelajaran.NamaMataPelajaran', 'like', $request->MataPelajaran]
        ])
        ->orWhere([
            ['MataPelajaran.PeruntukanKelas', 'like', $request->PeruntukanKelas],
            ['MataPelajaran.NamaMataPelajaran', 'like', $mapel]
        ])
        ->get()
        ->ignore($request->id);

        $namaGuru = User::select(DB::raw('CONCAT(NamaPertamaPengguna, NamaTerakhirPengguna) as NamaLengkap'))
        ->where('PeranPengguna', '=', 'Guru')
        ->get()
        ->ignore($request->id);

        $request->IDPengguna = JadwalKelas::join('Users', 'JadwalKelas.IDPengguna', '=', 'Users.id')
        ->join('MataPelajaran', 'Users.id', '=', 'MataPelajaran.IDPengguna')
        ->select('JadwalKelas.*', 'Users.*')
        ->where([
            ['Users.PeranPengguna', 'Guru'],
            ['Users.MataPelajaran', $mapel],
            ['MataPelajaran.NamaGuru', $namaGuru]
        ])
        ->orWhere([
            ['Users.PeranPengguna', 'Guru'],
            ['Users.MataPelajaran2', $mapel],
            ['MataPelajaran.NamaGuru', $namaGuru]
        ])
        ->orWhere([
            ['Users.PeranPengguna', 'Guru'],
            ['Users.MataPelajaran3', $mapel],
            ['MataPelajaran.NamaGuru', $namaGuru]
        ])
        ->orWhere([
            ['Users.PeranPengguna', 'Guru'],
            ['Users.MataPelajaran4', $mapel],
            ['MataPelajaran.NamaGuru', $namaGuru]
        ])
        ->get()->ignore($request->id);

        $jadwal->id = $request->id;
        $IDJadwalKelas = $jadwal->id;
        $dataJadwalKelas = JadwalKelas::findOrFail($IDJadwalKelas);

        $dataJadwalKelas->update([
            'WaktuPertemuan' => $request->WaktuPertemuan,
            'JenisPertemuan' => $request->JenisPertemuan,
            'RuangBelajar' => $request->RuangBelajar,
            'PeruntukanKelas' => $request->PeruntukanKelas,
            'MataPelajaran' => $request->MataPelajaran,
        ]);

        return redirect()->route('admin.pengelola-jadwal', compact('dataJadwalKelas'))->with(['success'=>'Jadwal Kelas berhasil disunting!']);
    } 

    public function hapusJadwal(JadwalKelas $jadwal): View
    {
        $IDJadwalKelas = $jadwal->id;
        $dataJadwalKelas = JadwalKelas::findOrFail($IDJadwalKelas);
        $dataJadwalKelas->delete();
        return view('admin.pengelola-jadwal', compact('dataJadwalKelas'))->with(['success'=>'Jadwal Kelas berhasil dihapus!']);
    }
}