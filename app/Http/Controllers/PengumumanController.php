<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use App\Models\Pengumuman;
use App\Models\User;
use App\Models\Guru;
use App\Models\Daftar;
use App\Models\Admin;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

class PengumumanController extends Controller
{
    public function index(){
        return view('siswa.pengumuman-khusus-siswa');
    }

    public function pengumumanBagiGuru(){
        return view('guru.pengumuman-khusus-guru');
    }

    public function inputPengumuman(){
        return view('admin.tambah-pengumuman');
    }

    public function pengumuman(Pengumuman $pengumuman){
        $IDPengumuman = $pengumuman->id;
        $dataPengumuman = Pengumuman::find($IDPengumuman);
        
        $jumlahPengumuman = Pengumuman::select('*')->count();
        
        return view('admin.pengelola-pengumuman', compact('dataPengumuman', 'jumlahPengumuman'));
    }

    public function isiPengumumanGuru(Pengumuman $pengumuman){
        $IDPengumuman = $pengumuman->id;
        $dataPengumuman = Pengumuman::find($IDPengumuman);
        return view('guru.isi-pengumuman-guru', compact('dataPengumuman'));
    }

    public function input(Request $request){
        $pengumuman = new Pengumuman();
        $pengumuman->JudulPengumuman = $request->JudulPengumuman;
        $pengumuman->IsiPengumuman = $request->IsiPengumuman;
        $pengumuman->BerkasPengumuman = $request->BerkasPengumuman;
        $pengumuman->IDPengguna = $request->IDPengguna; 

        $request->validate([
            'JudulPengumuman' => 'required | min: 6 ',
            'IsiPengumuman' => 'required | min: 10 ',
            'BerkasPengumuman' => 'required | mimes:pdf | max:2048'
        ]);

        $request->IDPengguna = DB::table('Pengumuman')
        ->join('Users', 'Users.id', '=', 'Pengumuman.IDPengguna')
        ->select('Users.*', 'Pengumuman.*')
        ->where(function (Builder $query){
            $query->where('Users.PeranPengguna', '=', 'Admin')
            ->where('Users.is_active', '=', 1);
        })
        ->orWhere(function (Builder $query){
            $query->where(Auth::user()->PeranPengguna, '=', 'Admin')
            ->where(Auth::user()->is_active, '=', 1);
        })
        ->get();
        
        $namaBerkasPengumuman = 'Pengumuman '.time().'-'.$request->JudulPengumuman.'.'.$request->file('BerkasPengumuman')->extension();  

        $lokasi = $request->file('BerkasPengumuman')->storeAs('uploads/Pengumuman', $namaBerkasPengumuman);

        $pengumuman->save();

        return redirect()->route('admin.tambah-pengumuman')->with(['success' => 'Pengumuman Baru berhasil ditambahkan!']);
    }

    public function suntingPengumuman(Pengumuman $pengumuman){
        $IDPengumuman = $pengumuman->id;
        $dataPengumuman = Pengumuman::findOrFail($IDPengumuman);
        return view('admin.sunting-pengumuman', compact('dataPengumuman')); 
    }

    public function revisiPengumuman(Request $request, $IDPengumuman){
        $this->validate($request, [
            'BerkasPengumuman' => 'required | mimes:pdf | max:2048',
            'JudulPengumuman' => 'required | min: 5',
            'IsiPengumuman'  => 'required | min: 5',
        ]);

        $request->IDPengguna = DB::table('Pengumuman')
        ->join('Users', 'Users.id', '=', 'Pengumuman.IDPengguna')
        ->select('Users.*', 'Pengumuman.*')
        ->where(function (Builder $query){
            $query->where('Users.PeranPengguna', '=', 'Admin')
            ->where('Users.is_active', '=', 1);
        })
        ->orWhere(function (Builder $query){
            $query->where(Auth::user()->PeranPengguna, '=', 'Admin')
            ->where(Auth::user()->is_active, '=', 1);
        })
        ->get();

        $pengumuman = Pengumuman::findOrFail($IDPengumuman);

        if ($request->hasFile('BerkasPengumuman')){
            $namaBerkasPengumuman = 'Pengumuman '.time().'-'.$request->JudulPengumuman.'-direvisi.'.$request->file->extension();  
            
            $berkasPengumuman = $request->file('BerkasPengumuman')->storeAs('uploads/Pengumuman/', $namaBerkasPengumuman);

            Pengumuman::delete('uploads/Pengumuman', $namaBerkasPengumuman);

            $pengumuman->delete('uploads/Pengumuman/', $request->file('BerkasPengumuman'));
            
            $request->where('id', '<>', $request->id)->update([
                'BerkasPengumuman' => $namaBerkasPengumuman,
                'JudulPengumuman' => $request->JudulPengumuman,
                'IsiPengumuman' => $request->IsiPengumuman,
                'IDPengguna' => $request->IDPengguna
            ]);
        }

        else{
            // Jika tidak ada berkas
            $request->where('id', '<>', $request->id)->update([
                'JudulPengumuman' => $request->JudulPengumuman,
                'IsiPengumuman' => $request->IsiPengumuman,
                'IDPengguna' => $request->IDPengguna
            ]);
        }
        
        return redirect()->route('admin.edit-pengumuman')->with(['success'=>'Pengumuman berhasil diperbarui!']);
    }

    public function hapusPengumuman(Pengumuman $pengumuman){
        $IDPengumuman = $pengumuman->id;
        $dataPengumuman = Pengumuman::find($IDPengumuman);
        Pengumuman::delete('uploads/Pengumuman'. $dataPengumuman->file('BerkasPengumuman'));
        $dataPengumuman->delete();
        return view('admin.daftar-pengumuman')->with(['success'=>'Pengumuman berhasil dihapus!']);
    }
}