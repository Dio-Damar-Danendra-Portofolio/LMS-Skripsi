<?php

namespace App\Models;

use Eloquent;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;
use App\Notifications\NotifikasiJadwalKelas;
use App\Notifications\NotifikasiKelas;
use App\Notifications\NotifikasiPembayaran;
use App\Notifications\NotifikasiPengumuman;
use App\Notifications\NotifikasiPesanBaru;
use App\Notifications\NotifikasiTugasMandiri;
use App\Notifications\NotifikasiUjian;
use App\Notifications\NotifikasiUlanganHarian;
use App\Notifications\NotifikasiUtasBaru;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";
    protected $primaryKey = "id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'NamaPertamaPengguna',
        'NamaTerakhirPengguna',
        'NomorIndukPengguna',
        'SurelPengguna',
        'KataSandiPengguna',
        'NomorPonselPengguna',
        'TanggalLahirPengguna',
        'TahunMasukPengguna',
        'PeranPengguna',
        'JenjangSiswa',
        'KelasSiswa',
        'JurusanSiswa',
        'MataPelajaran',
        'DivisiAdmin'
    ];

    protected $nullable = [
        'FotoProfilPengguna',
        'MataPelajaran2',
        'MataPelajaran3',
        'MataPelajaran4',
        'Semester',
        'PencarianKelas',
        'KelayakanUjianSiswa',
        'UangyangDibayar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'KataSandiPengguna',
        'remember_token'
    ];

    protected $casts = [
        'KataSandiPengguna' => 'hashed'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    public function berperanSebagaiSiswa(){
        return $this->hasOne(Siswa::class);
    }

    public function berperanSebagaiGuru(){
        return $this->hasOne(Guru::class);
    }

    public function berperanSebagaiAdmin(){
        return $this->hasOne(Admin::class);
    }
}
