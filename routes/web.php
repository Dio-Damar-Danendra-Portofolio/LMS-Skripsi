<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BalasanThreadController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalKelasController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LembarJawabanTugasMandiriController;
use App\Http\Controllers\LembarJawabanUjianController;
use App\Http\Controllers\LembarJawabanUlanganHarianController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SesiUjianController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TugasMandiriController;
use App\Http\Controllers\ThreadSiswaController;
use App\Http\Controllers\ThreadGuruController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\UlanganHarianController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('awal');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('awal', [HomeController::class, 'index'])->name("awal");

Route::get('daftar', [PenggunaController::class, 'index'])->name("daftar");
Route::post('daftar', [PenggunaController::class, 'daftar'])->name("mendaftar");

Route::get('masuk', [PenggunaController::class, 'masuk'])->name("masuk");
Route::post('otentikasi', [LoginController::class, 'otentikasi'])->name("otentikasi");

Route::get('masuk', [PenggunaController::class, 'masuk'])->name("masuk");

Route::get('beranda', [LoginController::class, 'berandaLMS'])->name("beranda");
Route::post('beranda', [LoginController::class, 'beranda'])->name("masuk");

Route::get('beranda-siswa', [SiswaController::class, 'index'])->name("siswa.beranda-siswa");
Route::get('beranda-guru', [GuruController::class, 'index'])->name("guru.beranda-guru");
Route::get('beranda-admin', [AdminController::class, 'index'])->name("admin.beranda-admin");

Route::get('keluar', [PenggunaController::class, 'keluar'])->name("keluar");

Route::get('kelas', [GuruController::class,'kelas'])->name("guru.kelas-guru");
Route::get('kelas-siswa', [SiswaController::class,'kelas'])->name("siswa.kelas-siswa");
Route::get('pengelola-kelas', [AdminController::class,'pengelolaKelas'])->name("admin.pengelola-kelas");

Route::get('ujian/pengawasan-ujian/IDUjian', [SesiUjianController::class,'sesiUjian'])->name("guru.sesi-ujian");

Route::get('profil-admin', [AdminController::class,'biodataAdmin'])->name("admin.profil-admin");
Route::get('profil-guru', [GuruController::class, 'biodataGuru'])->name("guru.profil-guru");
Route::get('profil-siswa', [SiswaController::class, 'biodataSiswa'])->name("siswa.profil-siswa");

Route::get('sunting-profil-siswa', [SiswaController::class, 'revisiProfilSiswa'])->name("siswa.sunting-profil-siswa");
Route::post('profil-siswa-yang-direvisi', [SiswaController::class, 'suntingProfilSiswa'])->name("profil-siswa-yang-direvisi");

Route::get('profil-siswa/ganti-kata-sandi', [SiswaController::class, 'gantiKataSandi'])->name("siswa.ganti-kata-sandi-siswa");
Route::get('profil-guru/ganti-kata-sandi', [GuruController::class, 'gantiKataSandi'])->name("guru.ganti-kata-sandi-guru");
Route::get('profil-admin/ganti-kata-sandi', [AdminController::class, 'gantiKataSandi'])->name("admin.ganti-kata-sandi");

Route::get('sunting-profil-guru', [GuruController::class,'suntingProfilGuru'])->name("guru.sunting-profil-guru");
Route::post('profil-guru', [GuruController::class,'revisiProfilGuru'])->name("profil-guru-yang-direvisi");

Route::get('sunting-profil-admin', [AdminController::class,'suntingProfilAdmin'])->name("admin.sunting-profil-admin");
Route::post('profil-admin', [AdminController::class,'perbaruiProfilAdmin'])->name("profil-admin-yang-direvisi");

Route::get('pengumuman-khusus-siswa', [PengumumanController::class, 'index'])->name("siswa.pengumuman-khusus-siswa");
Route::get('isi-pengumuman', [SiswaController::class, 'isiPengumuman'])->name("siswa.isi-pengumuman");
Route::get('pengumuman-khusus-guru', [GuruController::class, 'pengumuman'])->name("guru.pengumuman-khusus-guru");
Route::get('pengumuman-khusus-guru/isi', [PengumumanController::class, 'isiPengumumanGuru'])->name("guru.isi-pengumuman-guru");

Route::get('pengelola-pengumuman', [PengumumanController::class, 'pengumuman'])->name("admin.pengelola-pengumuman");
Route::post('pengumuman-terbaru', [PengumumanController::class, 'input'])->name("pengumuman-terbaru");

Route::get('pengumuman-baru', [AdminController::class, 'inputPengumuman'])->name("admin.tambah-pengumuman");
Route::get('pengumuman/IDPengumuman', [AdminController::class, 'lihatPengumuman'])->name("admin.lihat-pengumuman");
Route::get('pengumuman/IDPengumuman/sunting', [PengumumanController::class, 'suntingPengumuman'])->name("admin.sunting-pengumuman");

Route::get('rincian-pembayaran', [PembayaranController::class,'rincianPembayaran'])->name("pembayaran.rincian-pembayaran-siswa");
Route::get('pembayaran', [SiswaController::class, 'pembayaran'])->name("siswa.pembayaran-khusus-siswa");

Route::get('pengelola-pembayaran', [PembayaranController::class, 'urusPembayaran'])->name("admin.pengelola-pembayaran");
Route::post('pembayaran-terbaru', [PembayaranController::class, 'pembayaranBaru'])->name("pembayaran-terbaru");

Route::get('pembayaran-baru', [PembayaranController::class, 'tambahPembayaran'])->name("admin.tambah-pembayaran");

Route::get('pembayaran/IDPembayaran', [AdminController::class, 'lihatPembayaran'])->name("pembayaran.lihat-pembayaran");
Route::get('pembayaran/IDPembayaran/sunting', [PembayaranController::class, 'suntingPembayaran'])->name("admin.sunting-pembayaran");

Route::get('ujian', [SiswaController::class, 'ujian'])->name("siswa.ujian-siswa");
Route::get('ujian/sesi-ujian/kelayakan', [SiswaController::class, 'sesiUjian'])->name("siswa.kelayakan-ujian-siswa");

Route::get('mata-pelajaran', [SiswaController::class, 'matapelajaran'])->name("siswa.mata-pelajaran-siswa");
Route::get('mapel/materi', [MataPelajaranController::class, 'materiSiswa'])->name("mata_pelajaran.show");
Route::get('mapel/materi', [MataPelajaranController::class, 'materiSiswa'])->name("mata_pelajaran.isi-materi-siswa");
Route::get('mapel/materi/forum-untuk-siswa', [SiswaController::class, 'forum'])->name("mata_pelajaran.forum-untuk-siswa");
Route::get('mapel/materi/daftar-tugas-mandiri-khusus-siswa', [SiswaController::class, 'tugasMandiri'])->name("mata_pelajaran.daftar-tugas-mandiri-khusus-siswa");
Route::get('mapel/materi/daftar-ulangan-harian-khusus-siswa', [SiswaController::class, 'unggahLembarKerjaUlanganHarian'])->name("mata_pelajaran.daftar-ulangan-harian-khusus-siswa");
Route::get('mapel/materi/daftar-tugas-mandiri-khusus-guru', [TugasMandiriController::class,'untukGuru'])->name("mata_pelajaran.daftar-tugas-mandiri-khusus-guru");
Route::get('mapel/materi/forum-guru/thread-baru', [ForumController::class, 'isiForum'])->name("mata_pelajaran.thread-baru-guru");
Route::get('mapel/materi/materi-guru/absensi', [GuruController::class,'absensi'])->name("guru.absensi");

Route::get('mapel/materi/pratinjau', [MataPelajaranController::class,'lihatMapel'])->name("admin.lihat-mata-pelajaran");

Route::get('mapel/forum/rincian-forum', [ForumController::class,'lihatForum'])->name("mata_pelajaran.lihat-forum");

Route::get('mapel/forum-baru', [ForumController::class,'tambahForum'])->name("mata_pelajaran.lihat-forum");

Route::get('mapel/sunting-mata-pelajaran', [MataPelajaranController::class, 'suntingMapel'])->name("admin.sunting-mata-pelajaran");
Route::get('mapel/materi/tugas-mandiri/tugas-mandiri-baru', [TugasMandiriController::class,'tugasBaru'])->name("mata_pelajaran.tugas-mandiri-baru");
Route::get('mapel/materi/tugas-mandiri/sunting-tugas-mandiri', [TugasMandiriController::class,'suntingTugasMandiri'])->name("mata_pelajaran.sunting-tugas-mandiri");
Route::get('mapel/materi/ulangan-harian', [UlanganHarianController::class,'untukGuru'])->name("mata_pelajaran.daftar-ulangan-harian-khusus-guru");
Route::get('mapel/materi/ulangan-harian/ulangan-harian-baru', [UlanganHarianController::class,'tambahUlanganHarian'])->name("mata_pelajaran.ulangan-harian-baru");
Route::get('mapel/materi/ulangan-harian/IDUlanganHarian/sunting', [UlanganHarianController::class,'tambahUlanganHarian'])->name("mata_pelajaran.ulangan-harian-baru");
Route::get('mapel/ujian/semester', [GuruController::class,'periksaJawabanUjian'])->name("guru.periksa-jawaban-ujian");
Route::get('mapel/materi', [MateriController::class, 'lihatMateri'])->name("mata_pelajaran.isi-materi-siswa");
Route::get('mapel/materi/materi-khusus-guru', [MateriController::class, 'khususGuru'])->name("mata_pelajaran.isi-materi-guru");
Route::get('mapel/materi/sunting-materi', [MateriController::class, 'suntingMateri'])->name("mata_pelajaran.sunting-materi");
Route::get('mapel/materi/forum-guru/dataForum', [ForumController::class, 'untukGuru'])->name("mata_pelajaran.forum-untuk-guru");
Route::get('mapel/materi-baru', [MateriController::class, 'materiBaru'])->name("mata_pelajaran.tambah-materi");
Route::post('mapel/materi-baru', [MateriController::class, 'inputMateri'])->name("mata_pelajaran.tambah-materi");
Route::get('mapel/pratinjau-forum', [ForumController::class, 'lihatForum'])->name("mata_pelajaran.lihat-forum");
Route::get('mapel/materi/forum/sunting-forum', [ForumController::class, 'revisiForum'])->name("mata_pelajaran.sunting-forum");
Route::post('forum-diskusi-yang-direvisi', [ForumController::class, 'suntingForum'])->name("forum-diskusi-yang-direvisi");

Route::get('mapel/forum-baru', [ForumController::class, 'tambahForum'])->name("mata_pelajaran.forum-baru");
Route::post('mapel/pratinjau-forum', [ForumController::class, 'forumBaru'])->name("forum-diskusi-baru");

Route::get('laporan-nilai-akhir', [SiswaController::class, 'nilaiAkhir'])->name("siswa.nilai-akhir-siswa");
Route::get('IDMataPelajaran/nilai-akhir', [PenilaianController::class, 'laporanNilaiAkhirkhususGuru'])->name("guru.nilai-akhir-siswa");
Route::get('laporan-nilai-akhir/IDMataPelajaran/nilai-akhir', [PenilaianController::class, 'laporanNilaiAkhirkhususSiswa'])->name("siswa.laporan-nilai-akhir");
Route::get('mapel/forum/thread-siswa', [ThreadSiswaController::class, 'index'])->name("mata_pelajaran.isi-thread-siswa");

Route::get('pengelola-jadwal-kelas', [AdminController::class,'jadwalKelas'])->name("admin.pengelola-jadwal-kelas");

Route::get('penilaian', [PenilaianController::class, 'penilaianSiswa'])->name("guru.penilaian-siswa");

Route::get('obrolan-admin/kolom-obrolan', [ChatController::class,'kolomObrolanAdmin'])->name("admin.kolom-obrolan-admin");
Route::get('obrolan-guru/kolom-obrolan', [ChatController::class,'kolomObrolanGuru'])->name("guru.kolom-obrolan-guru");
Route::get('obrolan-siswa/kolom-obrolan', [ChatController::class,'kolomObrolanSiswa'])->name("siswa.kolom-obrolan-siswa");
Route::get('obrolan-guru', [GuruController::class, 'obrolan'])->name("guru.obrolan-guru");
Route::get('obrolan-siswa', [ChatController::class, 'index'])->name("siswa.obrolan-siswa");
Route::get('obrolan-admin', [AdminController::class, 'obrolanAdmin'])->name("admin.obrolan-admin");
Route::get('obrolan-guru/daftar-pengguna', [ChatController::class, 'chatuntukGuru'])->name("guru.daftar-pengguna");
Route::get('obrolan-siswa/daftar-pengguna', [ChatController::class, 'chatUntukSiswa'])->name("siswa.daftar-pengguna");
Route::get('obrolan-admin/daftar-pengguna', [ChatController::class, 'chatUntukAdmin'])->name("admin.daftar-pengguna");
Route::get('obrolan-guru/riwayat-pesan', [ChatController::class, 'riwayatPesanGuru'])->name("guru.riwayat-pesan");
Route::get('obrolan-siswa/riwayat-pesan', [ChatController::class, 'riwayatPesanSiswa'])->name("siswa.riwayat-pesan");
Route::get('obrolan-admin/riwayat-pesan', [ChatController::class, 'riwayatPesanAdmin'])->name("admin.riwayat-pesan");

Route::get('pengelola-jadwal/jadwal-baru', [JadwalKelasController::class,'jadwalBaru'])->name("admin.tambah-jadwal-kelas");
Route::post('jadwal-kelas-baru', [JadwalKelasController::class, 'inputJadwalKelas'])->name("jadwal-kelas-baru");

Route::get('jadwal/{IDJadwalKelas}/sunting', [JadwalKelasController::class, 'editJadwalKelas'])->name("admin.sunting-jadwal-kelas");
Route::post('jadwal-kelas-yang-direvisi', [JadwalKelasController::class, 'suntingJadwalKelas'])->name("jadwal-kelas-yang-direvisi");

Route::get('jadwal-khusus-guru', [GuruController::class, 'jadwalKelas'])->name("guru.jadwal-khusus-guru");
Route::get('jadwal-kelas-bagi-siswa', [SiswaController::class, 'jadwalSiswa'])->name("siswa.jadwal-kelas-bagi-siswa");

Route::get('input-nilai-akhir', [GuruController::class, 'inputNilaiAkhir'])->name("guru.input-nilai-akhir");
Route::post('nilai-akhir', [PenilaianController::class, 'inputNilai'])->name("nilai-akhir");

Route::get('daftar-mata-pelajaran', [GuruController::class, 'mapel'])->name("guru.daftar-mata-pelajaran");
Route::get('pengelola-mata-pelajaran', [AdminController::class, 'pengelolaMapel'])->name("admin.pengelola-mata-pelajaran");

Route::get('pengelola-mata-pelajaran/mata-pelajaran-baru', [MataPelajaranController::class, 'tambahMapel'])->name("admin.tambah-mata-pelajaran");
Route::post('mata-pelajaran-baru', [MataPelajaranController::class, 'mapelBaru'])->name("mata-pelajaran-baru");

Route::get('pengelola-mata-pelajaran/sunting-mata-pelajaran', [MataPelajaranController::class, 'suntingMapel'])->name("admin.sunting-mata-pelajaran");
Route::post('mata-pelajaran-yang-direvisi', [MataPelajaranController::class, 'perbaruiMapel'])->name("");

Route::get('ujian/pengawasan-ujian', [GuruController::class, 'pengawasanUjian'])->name("guru.pengawasan-ujian");
Route::get('ujian/pengelola-ujian', [AdminController::class, 'pengelolaUjian'])->name("admin.pengelola-ujian");
Route::get('ujian/tambah-ujian', [AdminController::class, 'inputUjian'])->name("admin.tambah-ujian");
Route::post('ujian-baru', [UjianController::class, 'ujianBaru'])->name("ujian-baru");

Route::get('SesiUjian/{IDUjian}/sunting', [UjianController::class, 'suntingSoalUjian'])->name("admin.sunting-ujian");
Route::post('sesi-ujian-yang-direvisi', [UjianController::class, 'revisiSoalUjian'])->name("sesi-ujian-yang-direvisi");

Route::get('mapel/materi/forum-siswa/thread-baru', [ForumController::class, 'inputThreadSiswa'])->name("mata_pelajaran.thread-baru-siswa");
Route::post('thread-baru-siswa', [ForumController::class, 'threadBaruSiswa'])->name("thread-baru-siswa");

Route::get('mapel/materi/forum-guru/thread-baru', [ForumController::class, 'inputThread'])->name("mata_pelajaran.thread-baru-siswa");
Route::post('thread-baru-guru', [ForumController::class, 'threadBaruGuru'])->name("thread-baru-guru");

Route::get('mapel/materi/thread/judulthread/isi', [ForumController::class, 'isiThreadSiswa'])->name("mata_pelajaran.isi-thread-siswa");

Route::get('mapel/forum', [ForumController::class, 'untukAdmin'])->name("mata_pelajaran.isi-forum-admin");

Route::get('mapel/ulangan-harian-baru', [UlanganHarianController::class, 'tambahUlanganHarian'])->name("mata_pelajaran.ulangan-harian-baru");
Route::post('ulangan-harian-baru', [UlanganHarianController::class, 'ulanganHarianBaru'])->name("ulangan-harian-baru");

Route::get('mapel/materi/forum/forum-baru', [ForumController::class, 'tambahForum'])->name("mata_pelajaran.tambah-forum");
Route::post('forum-diskusi-baru', [ForumController::class, 'forumBaru'])->name("forum-diskusi-baru");

Route::get('pengelola-kelas/kelas-baru', [KelasController::class, 'tambahKelas'])->name("admin.tambah-kelas");
Route::get('pengelola-kelas/{IDKelas}/pratinjau', [KelasController::class, 'pratinjauKelas'])->name("admin.lihat-kelas");

Route::get('pengelola-kelas/{IDKelas}/sunting', [KelasController::class, 'editKelas'])->name("admin.sunting-kelas");