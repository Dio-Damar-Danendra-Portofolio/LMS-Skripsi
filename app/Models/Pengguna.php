<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class Pengguna extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
        'PeranPengguna',
        'TahunMasukPengguna',
        'JenjangSiswa',
        'KelasSiswa',
        'JurusanSiswa',
        'MataPelajaran',
    ];

    protected $nullable = [
        'FotoProfilPengguna',
        'MataPelajaran2',
        'MataPelajaran3',
        'MataPelajaran4',
        'DivisiAdmin',
        'Semester',
        'PencarianKelas',
        'KelayakanUjianSiswa'
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
