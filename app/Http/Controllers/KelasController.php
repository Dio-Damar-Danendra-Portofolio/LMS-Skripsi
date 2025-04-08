<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\User;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    public function index(Kelas $kelas){
        $IDKelas = $kelas->id;
        $dataKelas = Kelas::find($IDKelas);

        $jumlahSiswa = DB::table('Kelas')
        ->select('JumlahSiswa')
        ->get();

        $daftar_siswa = DB::table('Kelas')
        ->join('Users', 'Users.id', '=', 'Kelas.IDPengguna')
        ->select('Users.*', 'Kelas.*')
        ->where([
            ['Users.PeranPengguna', '=', 'Siswa'],
            ['Users.KelasSiswa', '=', $dataKelas->NamaKelas]
        ])
        ->limit($jumlahSiswa)
        ->get();

        $namaWaliKelas = DB::table('Kelas')
        ->select('NamaWaliKelas')
        ->get();
        
        return view('siswa.kelas-siswa', compact('dataKelas'));
    }

    public function tambahKelas(){
        return view('admin.tambah-kelas');
    
    }

    public function kelasBaru(Request $request){
        $kelas = new Kelas();
        $kelas->IDPengguna = $request->IDPengguna;
        $kelas->NamaKelas = $request->NamaKelas;
        $kelas->NamaWaliKelas = $request->NamaWaliKelas;
        $kelas->JumlahSiswa = $request->JumlahSiswa;

        $namaWaliKelas = DB::table('Users')->select(DB::raw('CONCAT(NamaPertamaPengguna, NamaTerakhirPengguna) as NamaLengkap'))
        ->where('PeranPengguna', '=', 'Guru')
        ->limit(1)
        ->get();

        $request->IDPengguna = DB::table('Kelas')
        ->join('Users', 'Users.id', '=', 'Kelas.IDPengguna')
        ->select('Kelas.*', 'Users.*')
        ->where(function (Builder $query){
            $query->where($request->NamaWaliKelas, '=', $namaWaliKelas)
            ->where('Users.PeranPengguna', '=', 'Guru')
            ->where('Users.PeranPengguna', '=', 'Siswa')
            ->where('Users.KelasSiswa', '=', $request->NamaKelas);
        })
        ->get();

        $request->validate([
            'NamaKelas' => 'required | min: 5',
            'NamaWaliKelas' => 'required | min: 5',
            'JumlahSiswa' => 'required | numeric'
        ]);

        $kelas->save();

        return redirect()->route('admin.pengelola-kelas')->with(['success' => 'Kelas berhasil dimasukkan!']);
    }

    public function pratinjauKelas(Kelas $kelas){
        $IDKelas = $kelas->id;
        $dataKelas = Kelas::find($IDKelas);

        $namaWaliKelas = DB::table('Users')
        ->join('Kelas', 'Kelas.IDPengguna', '=', 'Users.id')
        ->select('Users.*', DB::raw("CONCAT(Users.NamaPertamaPengguna, ' ', Users.NamaTerakhirPengguna) as nama_lengkap_wali_kelas"))
        ->where('nama_lengkap_wali_kelas', '=', 'Kelas.NamaWaliKelas')
        ->where('Users.PeranPengguna', '=', 'Guru')
        ->get();

        $daftarSiswa = DB::table('Users')
        ->join('Kelas', 'Kelas.IDPengguna', '=', 'Users.id')
        ->select('Users.*', DB::raw("CONCAT(Users.NamaPertamaPengguna, ' ', Users.NamaTerakhirPengguna) as nama_lengkap_siswa"))
        ->where('Users.PeranPengguna', '=', 'Siswa')
        ->where('')
        ->get();
        return view('admin.lihat-kelas', compact('dataKelas', 'namaWaliKelas'));
    }

    public function editKelas(Kelas $kelas){
        $IDKelas = $kelas->id;
        $dataKelas = Kelas::findOrFail($IDKelas);
        return view('admin.sunting-kelas', compact('dataKelas'));
    }
    
    public function suntingKelas(Request $request, Kelas $kelas){
        $request->validate([
            'NamaKelas' => 'required | min: 5',
            'JumlahSiswa' => 'required | numeric',
            'NamaWaliKelas' => 'required | min: 3'
        ]);

        $namaWaliKelas = DB::table('Users')->select(DB::raw('CONCAT(NamaPertamaPengguna, NamaTerakhirPengguna) as NamaLengkap'))
        ->where('PeranPengguna', '=', 'Guru')
        ->limit(1)
        ->get();

        $request->IDPengguna = DB::table('Kelas')
        ->join('Users', 'Users.id', '=', 'Kelas.IDPengguna')
        ->select('Kelas.*', 'Users.*')
        ->where(function (Builder $query){
            $query->where($request->NamaWaliKelas, '=', $namaWaliKelas)
            ->where('Users.PeranPengguna', '=', 'Guru')
            ->where('Users.PeranPengguna', '=', 'Siswa')
            ->where('Users.KelasSiswa', '=', $request->NamaKelas);
        })
        ->get();


        $kelas->id = $request->id;
        $IDKelas = $kelas->id;
        $dataKelasRevisi = Kelas::findOrFail($IDKelas);

        $request->where('id', '<>', $request->id)->update([
            'NamaKelas' => $request->NamaKelas,
            'JumlahSiswa' => $request->JumlahSiswa,
            'NamaWaliKelas' => $request->NamaWaliKelas,
            'IDPengguna' => $request->IDPengguna
        ]);

        $request->save();

        return redirect()->route('admin.pengelola-kelas', compact('dataKelasRevisi'))->with('success', 'Kelas berhasil disunting!');
    }

    public function hapusKelas(Kelas $kelas){
        $IDKelas = $kelas->id;
        $dataKelas = Kelas::findOrFail($IDKelas);
        $dataKelas->delete();
        return view('admin.sunting-kelas', compact('dataKelas'))->with(['success'=>'Kelas berhasil dihapus!']);
    }
}