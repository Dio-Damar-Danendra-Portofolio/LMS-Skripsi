<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use App\Models\Materi;
use App\Models\JadwalKelas;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Guru;
use App\Models\Daftar;
use App\Models\Admin;
use App\Models\Siswa;

class MataPelajaranController extends Controller
{

    public function __invoke(){
        
    }

    public function index(){
        $matapelajaran = MataPelajaran::select('*');
        $kelas = Kelas::select('*'); 
        return view('admin.pengelola-mata-pelajaran', compact('matapelajaran', 'kelas'));
    }

    public function mapelUntukSiswa(MataPelajaran $mapel){
        $IDMataPelajaran = $mapel->IDMataPelajaran;
        $dataMataPelajaran = MataPelajaran::find($IDMataPelajaran);
        return view('siswa.mata-pelajaran-siswa', compact('dataMataPelajaran'));
    }

    public function show(MataPelajaran $mapel){
        $IDMataPelajaran = $mapel->id;
        $dataMataPelajaran = MataPelajaran::find($IDMataPelajaran);
        return view('mata_pelajaran.show', compact('dataMataPelajaran'));
    }

    public function materiSiswa(Materi $materi){
        $IDMateri = $materi->id;
        $dataMateri = Materi::find($IDMateri);
        return view('mata_pelajaran.isi-materi-siswa', compact('dataMateri'));
    }    

    public function materiGuru(Materi $materi){
        $IDMateri = $materi->id;
        $dataMateri = Materi::find($IDMateri);
        return view('mata_pelajaran.isi-materi-guru', compact('dataMateri'));
    }

    public function tambahMapel(){
        return view('admin.tambah-mata-pelajaran');
    }

    public function mapelBaru(Request $request){
        $mapel = new MataPelajaran();
        $mapel->NamaMataPelajaran = $request->NamaMataPelajaran;
        $mapel->NamaGuru = $request->NamaGuru;
        $mapel->KelompokMataPelajaran = $request->KelompokMataPelajaran;
        $mapel->PeruntukanKelas = $request->PeruntukanKelas;
        $mapel->IDPengguna = $request->IDPengguna;
        $mapel->IDKelas = $request->IDKelas;

        $namaGuru = DB::table('Users')
        ->select(DB::raw('CONCAT(NamaPertamaPengguna, NamaTerakhirPengguna) as NamaLengkapGuru'))
        ->where('PeranPengguna', '=', 'Guru')
        ->limit(1)
        ->get();

        $mapelUtama = Auth::user()->MataPelajaran->get();

        $mapelSampingan = Auth::user()->MataPelajaran2->get();

        $mapelTambahan = Auth::user()->MataPelajaran3->get();

        $mapelTerakhir = Auth::user()->MataPelajaran4->get();

        $namaMataPelajaranPrimer = DB::table('Users')
        ->select('MataPelajaran')
        ->get();

        $namaMataPelajaranSekunder = DB::table('Users')
        ->select('MataPelajaran2')
        ->get();

        $namaMataPelajaranTersier = DB::table('Users')
        ->select('MataPelajaran3')
        ->get();

        $namaMataPelajaranKuartener = DB::table('Users')
        ->select('MataPelajaran4')
        ->get();

        $kelas = DB::table('Kelas')
        ->select('NamaKelas')
        ->get();

        $request->IDPengguna = DB::table('MataPelajaran')
        ->join('Users', 'Users.id', '=', 'MataPelajaran.IDPengguna')
        ->select('Users.*', 'MataPelajaran.*')
        ->where(function (Builder $query){
                $query->where([
                    ['Users.PeranPengguna', '=', 'Guru'],
                    [$request->NamaGuru, '=', $namaGuru],
                    [$request->NamaMataPelajaran, '=', $namaMataPelajaranPrimer]
                ])
                ->orWhere([
                    ['Users.PeranPengguna', '=', 'Guru'],
                    [$request->NamaGuru, '=', $namaGuru],
                    [$request->NamaMataPelajaran, '=', $namaMataPelajaranSekunder]
                ])
                ->orWhere([
                    ['Users.PeranPengguna', '=', 'Guru'],
                    [$request->NamaGuru, '=', $namaGuru],
                    [$request->NamaMataPelajaran, '=', $namaMataPelajaranTersier]
                ])
                ->orWhere([
                    ['Users.PeranPengguna', '=', 'Guru'],
                    [$request->NamaGuru, '=', $namaGuru],
                    [$request->NamaMataPelajaran, '=', $namaMataPelajaranKuartener]
                ]);
            })
        ->orWhere(function (Builder $query){
            $query->where([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [$request->NamaGuru, '=', $namaGuru],
                [$request->NamaMataPelajaran, '=', $mapelUtama]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [$request->NamaGuru, '=', $namaGuru],
                [$request->NamaMataPelajaran, '=', $mapelSampingan]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [$request->NamaGuru, '=', $namaGuru],
                [$request->NamaMataPelajaran, '=', $mapelTambahan]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [$request->NamaGuru, '=', $namaGuru],
                [$request->NamaMataPelajaran, '=', $mapelTerakhir]
            ]);
        })  
        ->get();

        $request->IDKelas = DB::table('MataPelajaran')
        ->join('Kelas', 'Kelas.id', '=',  'MataPelajaran.IDKelas')
        ->select('Kelas.*', 'MataPelajaran.*')
        ->where($request->PeruntukanKelas, '=', $kelas)
        ->limit(1)
        ->get();        
        
        $request->validate($request, [
            'NamaMataPelajaran' => 'required|min:5',
            'NamaGuru' => 'required | min:5',
            'KelompokMataPelajaran' => 'required|min:3',
            'PeruntukanKelas'  => 'required| min:5'            
        ]);

        $mapel->save();

        return redirect()->route('admin.daftar-mata-pelajaran')->with(['success'=>'Mata Pelajaran berhasil dimasukkan!']);
    }

    public function suntingMapel(MataPelajaran $mapel){
        $IDMataPelajaran = $mapel->id;
        $dataMataPelajaran = MataPelajaran::findOrFail($IDMataPelajaran);
        return view('admin.sunting-mata-pelajaran', compact('dataMataPelajaran'));
    }

    public function lihatMapel(MataPelajaran $mapel, JadwalKelas $jadwal, Materi $materi){
        $IDMataPelajaran = $mapel->id;
        $dataMataPelajaran = MataPelajaran::find($IDMataPelajaran);

        $IDJadwal = $jadwal->id;
        $dataJadwal = JadwalKelas::find($IDJadwal);

        $IDMateri = $materi->id;
        $dataMateri = Materi::find($IDMateri);

        return view('admin.lihat-mata-pelajaran', compact('dataMataPelajaran', 'dataJadwal', 'dataMateri'));
    }

    public function perbaruiMapel(Request $request, MataPelajaran $mapel){

        $namaGuru = DB::table('Users')
        ->select(DB::raw('CONCAT(NamaPertamaPengguna, NamaTerakhirPengguna) as NamaLengkapGuru'))
        ->where('PeranPengguna', '=', 'Guru')
        ->limit(1)
        ->get();

        $mapelUtama = Auth::user()->MataPelajaran->get();

        $mapelSampingan = Auth::user()->MataPelajaran2->get();

        $mapelTambahan = Auth::user()->MataPelajaran3->get();

        $mapelTerakhir = Auth::user()->MataPelajaran4->get();

        $namaMataPelajaranPrimer = DB::table('Users')
        ->select('MataPelajaran')
        ->get();

        $namaMataPelajaranSekunder = DB::table('Users')
        ->select('MataPelajaran2')
        ->get();

        $namaMataPelajaranTersier = DB::table('Users')
        ->select('MataPelajaran3')
        ->get();

        $namaMataPelajaranKuartener = DB::table('Users')
        ->select('MataPelajaran4')
        ->get();

        $kelas = DB::table('Kelas')
        ->select('NamaKelas')
        ->get();

        $request->IDPengguna = DB::table('MataPelajaran')
        ->join('Users', 'Users.id', '=', 'MataPelajaran.IDPengguna')
        ->select('Users.*', 'MataPelajaran.*')
        ->where(function (Builder $query){
                $query->where([
                    ['Users.PeranPengguna', '=', 'Guru'],
                    [$request->NamaGuru, '=', $namaGuru],
                    [$request->NamaMataPelajaran, '=', $namaMataPelajaranPrimer]
                ])
                ->orWhere([
                    ['Users.PeranPengguna', '=', 'Guru'],
                    [$request->NamaGuru, '=', $namaGuru],
                    [$request->NamaMataPelajaran, '=', $namaMataPelajaranSekunder]
                ])
                ->orWhere([
                    ['Users.PeranPengguna', '=', 'Guru'],
                    [$request->NamaGuru, '=', $namaGuru],
                    [$request->NamaMataPelajaran, '=', $namaMataPelajaranTersier]
                ])
                ->orWhere([
                    ['Users.PeranPengguna', '=', 'Guru'],
                    [$request->NamaGuru, '=', $namaGuru],
                    [$request->NamaMataPelajaran, '=', $namaMataPelajaranKuartener]
                ]);
            })
        ->orWhere(function (Builder $query){
            $query->where([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [$request->NamaGuru, '=', $namaGuru],
                [$request->NamaMataPelajaran, '=', $mapelUtama]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [$request->NamaGuru, '=', $namaGuru],
                [$request->NamaMataPelajaran, '=', $mapelSampingan]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [$request->NamaGuru, '=', $namaGuru],
                [$request->NamaMataPelajaran, '=', $mapelTambahan]
            ])
            ->orWhere([
                [Auth::user()->PeranPengguna, '=', 'Guru'],
                [$request->NamaGuru, '=', $namaGuru],
                [$request->NamaMataPelajaran, '=', $mapelTerakhir]
            ]);
        })       
        ->get();

        $request->IDKelas = DB::table('MataPelajaran')
        ->join('Kelas', 'Kelas.id', '=',  'MataPelajaran.IDKelas')
        ->select('Kelas.*', 'MataPelajaran.*')
        ->where($request->PeruntukanKelas, '=', $kelas)
        ->limit(1)
        ->get(); 

        $request->validate([
            'NamaMataPelajaran' => 'required|min:5',
            'NamaGuru' => 'required | min:5',
            'KelompokMataPelajaran' => 'required|min:3',
            'PeruntukanKelas' => 'required| min:5'            
        ]);

        $IDMataPelajaran = $mapel->id;
        $dataMataPelajaran = MataPelajaran::findOrFail($IDMataPelajaran);

        $request->where('id', '<>', $request->id)->update([
            'NamaMataPelajaran' => $request->NamaMataPelajaran,
            'NamaGuru' => $request->NamaGuru,
            'KelompokMataPelajaran' => $request->KelompokMataPelajaran,
            'PeruntukanKelas' => $request->PeruntukanKelas,
            'IDPengguna'=> $request->IDPengguna,
            'IDKelas' => $request->IDKelas
        ]);

        return redirect()->route('admin.daftar-mata-pelajaran')->with(['success' => 'Mata Pelajaran berhasil diperbarui!']);
    }

    public function hapusMapel(MataPelajaran $mapel){
        $IDMataPelajaran = $mapel->id;
        $dataMataPelajaran = MataPelajaran::find($IDMataPelajaran);
        MataPelajaran::delete($dataMataPelajaran);
        $dataMataPelajaran->delete();
        return view('admin.daftar-mata-pelajaran')->with(['success' => 'Mata Pelajaran berhasil dihapus!']);
    }

    public function semesterSiswa(Request $request){
        
        $cariSemester = $request->cariSemester;
        $cariTahunAjaran = $request->cariTahunAjaran;

        if($request->has(['cariSemester', 'cariTahunAjaran'])){
            $data = DB::table('MataPelajaran')
            ->join('Users', 'Users.id', '=', 'MataPelajaran.IDPengguna')
            ->select('MataPelajaran.*', 'Users.*')
            ->where(function(Builder $query){
                $query->where('MataPelajaran.PeruntukanKelas', '=', Auth::user()->KelasSiswa)
                ->where(Auth::user()->Semester, 'like', '%'.$cariSemester.'%')
                ->where(Auth::user()->TahunAjaran, 'like', '%'.$cariTahunAjaran.'%');
            })
            ->get();
            
            return redirect()->route('siswa.mata-pelajaran-siswa', ['data' => $data]);
        }

        else{
            return redirect()->route('siswa.mata-pelajaran-siswa');
        }
    }

    public function semesterAdmin(Request $request){
        $cariSemester = $request->cariSemester;
        $cariKelas = $request->cariKelas;

        $mapel = DB::table('MataPelajaran')
        ->select('NamaMataPelajaran', 'KelompokMataPelajaran')
        ->get();
        
        if($request->has(['cariSemester', 'cariKelas'])){
            $data = DB::table('MataPelajaran')
            ->join('Users', 'Users.id', '=', 'MataPelajaran.IDPengguna')
            ->select('MataPelajaran.*', 'Users.*')
            ->where(function(Builder $query){
                $query->where('MataPelajaran.PeruntukanKelas', '=', $cariKelas)
                ->where(Auth::user()->Semester, '=', $cariSemester)
                ->where(Auth::user()->MataPelajaran, '=', $mapel);
            })
            ->orWhere(function(Builder $query){
                $query->where('MataPelajaran.PeruntukanKelas', '=', $cariKelas)
                ->where(Auth::user()->Semester, '=', $cariSemester)
                ->where(Auth::user()->MataPelajaran2, '=', $mapel);
            })
            ->orWhere(function(Builder $query){
                $query->where('MataPelajaran.PeruntukanKelas', '=', $cariKelas)
                ->where(Auth::user()->Semester, '=', $cariSemester)
                ->where(Auth::user()->MataPelajaran3, '=', $mapel);
            })
            ->orWhere(function(Builder $query){
                $query->where('MataPelajaran.PeruntukanKelas', '=', $cariKelas)
                ->where(Auth::user()->Semester, '=', $cariSemester)
                ->where(Auth::user()->MataPelajaran4, '=', $mapel);
            })
            ->get();
            return redirect()->route('admin.pengelola-mata-pelajaran', ['data' => $data]);
        }
            else{
                return redirect()->route('admin.pengelola-mata-pelajaran');
            }
    }

    public function semesterGuru(Request $request){

        $cariSemester = $request->cariSemester;
        $cariKelas = $request->cariKelas;

        $mapel = DB::table('MataPelajaran')
        ->select('NamaMataPelajaran', 'KelompokMataPelajaran')
        ->get();
        
        if($request->has(['cariSemester', 'cariKelas'])){
            $data = DB::table('MataPelajaran')
            ->join('Users', 'Users.id', '=', 'MataPelajaran.IDPengguna')
            ->select('MataPelajaran.*', 'Users.*')
            ->where(function(Builder $query){
                $query->where('MataPelajaran.PeruntukanKelas', '=', $cariKelas)
                ->where(Auth::user()->Semester, '=', $cariSemester)
                ->where(Auth::user()->MataPelajaran, '=', $mapel);
            })
            ->orWhere(function(Builder $query){
                $query->where('MataPelajaran.PeruntukanKelas', '=', $cariKelas)
                ->where(Auth::user()->Semester, '=', $cariSemester)
                ->where(Auth::user()->MataPelajaran2, '=', $mapel);
            })
            ->orWhere(function(Builder $query){
                $query->where('MataPelajaran.PeruntukanKelas', '=', $cariKelas)
                ->where(Auth::user()->Semester, '=', $cariSemester)
                ->where(Auth::user()->MataPelajaran3, '=', $mapel);
            })
            ->orWhere(function(Builder $query){
                $query->where('MataPelajaran.PeruntukanKelas', '=', $cariKelas)
                ->where(Auth::user()->Semester, '=', $cariSemester)
                ->where(Auth::user()->MataPelajaran4, '=', $mapel);
            })
            ->get();
            return redirect()->route('guru.mata-pelajaran-guru', ['data' => $data]);
        }
        else{
            return redirect()->route('guru.mata-pelajaran-guru');
        }
    }
    public function grupA(){
        $dataMataPelajaran = DB::table('MataPelajaran')
        ->select('*')
        ->where('KelompokMataPelajaran', '=', 'A')
        ->get();

        return view('siswa.mata-pelajaran-siswa', ['dataMataPelajaran' => $dataMataPelajaran]);
    }

    public function grupB(){
        $dataMataPelajaran = DB::table('MataPelajaran')
        ->select('*')
        ->where('KelompokMataPelajaran', '=', 'B')
        ->get();

        return view('siswa.mata-pelajaran-siswa', ['dataMataPelajaran' => $dataMataPelajaran]);
    }

    public function grupC(){
        $dataMataPelajaran = DB::table('MataPelajaran')
        ->select('*')
        ->where('KelompokMataPelajaran', '=', 'C')
        ->get();

        return view('siswa.mata-pelajaran-siswa', ['dataMataPelajaran' => $dataMataPelajaran]);
    }
}