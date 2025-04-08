<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\UlanganHarian;
use App\Models\MataPelajaran;
use App\Models\Pengumuman;
use App\Models\Pembayaran;
use App\Models\JadwalKelas;
use App\Models\Forum;
use App\Models\Ujian;
use App\Models\TugasMandiri;
use App\Http\Controllers\PengumumanController;
use Hash;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SiswaController extends Controller
{
    public function __invoke(){
        // 
    }
    
    public function index(){
        return view('siswa.beranda-siswa');
    }

    public function kelas(){
        return view('siswa.kelas-siswa');
    }

    public function jadwalSiswa(JadwalKelas $jadwal){
        $IDJadwalKelas = $jadwal->id;
        $dataJadwalKelas = JadwalKelas::find('IDJadwalKelas'); 
        return view('siswa.jadwal-kelas-bagi-siswa', compact('dataJadwalKelas'));
    }

    public function biodataSiswa(){
        return view('siswa.profil-siswa');
    }

    public function gantiKataSandi(){
        return view('siswa.ganti-kata-sandi-siswa');
    }

    public function revisiProfilSiswa(){
        return view('siswa.sunting-profil-siswa');
    }

    public function suntingProfilSiswa(Request $request):RedirectResponse
    {
        $request->validate([
            'JenjangSiswa' => 'min: 3'->ignore($request->id),
            'KelasSiswa' => 'min: 3'->ignore($request->id),
            'FotoProfilPengguna' => 'mimes: png, jpg, jpeg | max:2048'->ignore($request->id),
            'JurusanSiswa' => 'min: 3'->ignore($request->id)
        ]);

        $namaberkas = 'Profil Siswa '.time().Auth::user()->NomorIndukPengguna.'-'.Auth::user()->NamaPertamaPengguna.' '.Auth::user()->NamaTerakhirPengguna.'.'.$request->file('FotoProfilPengguna')->extension(); 
        
        $request->file('FotoProfilPengguna')->move(public_path('uploads/FotoProfilSiswa/'), $namaberkas);

        if ($request->hasFile('FotoProfilPengguna')) {
            $request->update([
                'JenjangSiswa' => $request-> JenjangSiswa,
                'KelasSiswa' => $request->KelasSiswa,
                'JurusanSiswa' => $request->JurusanSiswa,
                'FotoProfilPengguna'=> $namaberkas
            ]->ignore($request->id));
        }
        else {
            $request->update([
                'JenjangSiswa' => $request-> JenjangSiswa,
                'KelasSiswa' => $request->KelasSiswa,
                'JurusanSiswa' => $request->JurusanSiswa,
            ]->ignore($request->id));
        }

        return redirect()->route('siswa.profil-siswa')->with(['success'=>'Profil Anda telah diperbarui!']);
    }

    public function pengumuman(){
        return view('siswa.pengumuman-khusus-siswa');
    }

    public function isiPengumuman(Pengumuman $pengumuman){
        $IDPengumuman = $pengumuman->id;
        $dataPengumuman = Pengumuman::find($IDPengumuman);
        return view('siswa.isi-pengumuman', compact('dataPengumuman'));
    }

    public function pembayaran(){
        return view('siswa.pembayaran-khusus-siswa');
    }

    public function rincianPembayaran(){
        return view('siswa.');
    }

    public function matapelajaran(){
        return view('siswa.mata-pelajaran-siswa');
    }

    public function rincianMataPelajaran(MataPelajaran $mapel){
        $IDMataPelajaran = $mapel->IDMataPelajaran;
        $dataMataPelajaran = MataPelajaran::find($IDMataPelajaran);
        return view('mata_pelajaran.show', compact('dataMataPelajaran'));
    }


    public function ulanganHarian(UlanganHarian $ulanganharian){
        $IDUlanganHarian = $ulanganharian->IDUlanganHarian;
        $dataUlanganHarian = UlanganHarian::find($IDUlanganHarian);
        return view('mata_pelajaran.ulangan-harian-untuk-siswa', compact('dataUlanganHarian'));
    }  

    public function tugasMandiri(TugasMandiri $tugasmandiri){
        $IDTugasMandiri = $tugasmandiri->IDTugasMandiri;
        $dataTugasMandiri = TugasMandiri::find($IDTugasMandiri);
        return view('mata_pelajaran.daftar-tugas-mandiri-khusus-siswa', compact('dataTugasMandiri'));
    }  

    public function forum(Forum $forum){
        $IDForum = $forum->IDForum;
        $dataForum = Forum::find($IDForum);
        return view('mata_pelajaran.forum-untuk-siswa', compact('dataForum'));
    }  

    public function obrolan(){
        return view('siswa.obrolan-siswa');
    }  

    public function kolomObrolan(Chat $chat){
        $IDChat = $chat->IDChat;
        $dataChat = Chat::find($IDChat);
        return view('siswa.kolom-obrolan', compact('dataChat'));
    }

    public function ujian(){
        return view('siswa.ujian-siswa');
    }

    public function sesiUjian(Ujian $ujian){
        $IDUjian = $ujian->id;
        $dataUjian = Ujian::find($IDUjian);
        return view('siswa.kelayakan-ujian-siswa', compact('dataUjian'));
    }

    public function nilaiAkhir(){
        return view('siswa.nilai-akhir-siswa');
    }

    public function kelayakanSiswa(Ujian $ujian, Siswa $siswa){
        $IDUjian = $ujian->id;
        $dataUjian = Ujian::find($IDUjian);

        $IDSiswa = Auth::user()->id;

        $kelas = DB::table('Kelas')
        ->join('Ujian', 'Kelas.id', '=', 'Ujian.IDKelas')
        ->select('Kelas.NamaKelas', 'Ujian.PeruntukanKelas')
        ->get();

        $pengguna = Auth::user()->id
        ->where('PeranPengguna', '=', 'Siswa')
        ->where('KelasSiswa', '=', $kelas)
        ->get();

        return view('siswa.kelayakan-ujian-siswa', compact('dataUjian'));
    }

    public function kelayakanUjianSiswa(Ujian $ujian, Request $request){
        $IDUjian = $ujian->id;
        $dataUjian = Ujian::find($IDUjian);
        
        $request->validate([
            'KelayakanUjianSiswa' => 'boolean'
        ]);

        if ($request->KelayakanUjianSiswa == 0) {
            $request->update([
                'KelayakanUjianSiswa' => $request->KelayakanUjianSiswa
            ]);
            return view('siswa.kelayakan-ujian-siswa', compact('dataUjian'))->with(['status'=>'Siswa tidak layak untuk mengikuti ujian']);
        }
        else {
            $request->update([
                'KelayakanUjianSiswa' => $request->KelayakanUjianSiswa
            ]);
            return view('siswa.kelayakan-ujian-siswa', compact('dataUjian'))->with(['status'=>'Siswa layak untuk mengikuti ujian']);
        }

    }

    public function threadBaru(){
        return view('mata_pelajaran.thread-baru-siswa');
    }

    public function unggahLembarKerjaUjian(){
        return view('siswa.ujian-daring');
    }

    public function unggahLembarKerjaUlanganHarian(){
        return view('mata_pelajaran.daftar-ulangan-harian-khusus-siswa');
    }
}