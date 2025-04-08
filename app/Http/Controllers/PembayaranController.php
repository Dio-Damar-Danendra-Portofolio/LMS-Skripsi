<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Daftar;
use App\Models\Pembayaran;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Models\Admin;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    
    public function index()
    {
        $dataPembayaran = Pembayaran::select('*');

        $jumlahPembayaran = Pembayaran::select('*')->count();

        return view('siswa.pembayaran-khusus-siswa', compact('dataPembayaran', 'jumlahPembayaran'));
    }

    public function urusPembayaran(){
        $dataPembayaran = Pembayaran::select('*');

        $jumlahPembayaran = Pembayaran::select('*')->count();
        
        return view('admin.pengelola-pembayaran', compact('dataPembayaran', 'jumlahPembayaran'));
    }

    public function rincianPembayaran(Pembayaran $pembayaran){
        $IDPembayaran = $pembayaran->IDPembayaran;
        $rincian = Pembayaran::find($IDPembayaran);
        return view('pembayaran.rincian-pembayaran-siswa', compact('rincian'));
    }  

    public function tambahPembayaran(){
        return view('admin.tambah-pembayaran');
    }

    public function pembayaranBaru(Request $request){
        $pembayaran = new Pembayaran();
        $pembayaran->NamaPembayaran = $request->NamaPembayaran;
        $pembayaran->TanggalPembayaran = $request->TanggalPembayaran;
        $pembayaran->JenisPembayaran = $request->JenisPembayaran;
        $pembayaran->StatusPembayaran = $request->StatusPembayaran;
        $pembayaran->NominalPembayaran = $request->NominalPembayaran;
        $pembayaran->SisaPembayaran = $request->SisaPembayaran;
        $pembayaran->IDPengguna = $request->IDPengguna;

        $request->SisaPembayaran = $request->NominalPembayaran - $UangyangDibayar;

        $UangyangDibayar = User::select('UangyangDibayar')->get();

        $request->validate([
            'TanggalPembayaran' => 'required | date',
            'JenisPembayaran' => 'required | min: 3',
            'StatusPembayaran' => 'required | boolean',
            'NominalPembayaran' => 'required | numeric',
            'NamaPembayaran' => 'required | min:3 '
        ]);

        $request->IDPengguna = DB::table('Pembayaran')
        ->join('Users', 'Users.id', '=', 'Pembayaran.IDPengguna')
        ->select('Users.*', 'Pembayaran.*')
        ->where([
            [Auth::user()->PeranPengguna, '=', 'Admin'],
            [Auth::user()->is_active, '=', 1]
        ])
        ->orWhere([
            [Auth::user()->PeranPengguna, '=', 'Siswa'],
            [Auth::user()->is_active, '=', 1]
        ])
        ->get();

        $pembayaran->save();

        return redirect()->route('admin.pengelola-pembayaran')->with(['success' => 'Pembayaran Baru berhasil dimasukkan!']);
    }

    public function suntingPembayaran(Pembayaran $pembayaran){
        $IDPembayaran = $pembayaran->id;
        $dataPembayaran = Pembayaran::findOrFail($IDPembayaran);
        return view('admin.sunting-pembayaran', compact('dataPembayaran')); 
    }

    public function editPembayaran(Request $request, Pembayaran $pembayaran){
        $this->validate($request, [
            'TanggalPembayaran' => 'date',
            'JenisPembayaran' => 'min:3',
            'StatusPembayaran' => 'boolean',
            'NominalPembayaran' => 'numeric',
            'SisaPembayaran' => 'numeric | required',
            'NamaPembayaran' =>'required'
        ]);

        $request->IDPengguna = DB::table('Pembayaran')
        ->join('Users', 'Users.id', '=', 'Pembayaran.IDPengguna')
        ->select('Users.*', 'Pembayaran.*')
        ->where([
            [Auth::user()->PeranPengguna, '=', 'Admin'],
            [Auth::user()->is_active, '=', 1]
        ])
        ->orWhere([
            [Auth::user()->PeranPengguna, '=', 'Siswa'],
            [Auth::user()->is_active, '=', 1]
        ])
        ->get();

        $IDPembayaran = $pembayaran->id;
        $dataPembayaran = Pembayaran::findOrFail($IDPembayaran);
        $dataPembayaran->delete();

        $request->where('id', '<>', $request->id)->update([
            'TanggalPembayaran' => $request->TanggalPembayaran,
            'JenisPembayaran' => $request->JenisPembayaran,
            'StatusPembayaran' => $request->StatusPembayaran,
            'NominalPembayaran' => $request->NominalPembayaran,
            'SisaPembayaran' => $request->SisaPembayaran,
            'NamaPembayaran' => $request->NamaPembayaran,
            'IDPengguna' => $request->IDPengguna
        ]);

        return redirect()->route('admin.edit-pembayaran')->with(['success' => 'Pembayaran berhasil di-update!']);
    }

    public function hapusPembayaran(Pembayaran $pembayaran){
        $IDPembayaran = $pembayaran->id;
        $dataPembayaran = Pembayaran::findOrFail($IDPembayaran);
        Pembayaran::delete($dataPembayaran);
        $dataPembayaran->delete();
        return redirect()->route('admin.pengelola-pembayaran')->with(['success' => 'Pembayaran berhasil dihapus!']);
    }
}