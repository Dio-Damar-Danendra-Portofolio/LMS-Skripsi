<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class Siswa extends User
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";
    protected $primaryKey = "id";
    
    protected $fillable = [
        'NamaPertamaPengguna', 'NamaTerakhirPengguna', 'NomorIndukPengguna', 'PeranPengguna',
        'SurelPengguna', 'NomorPonselPengguna', 'TanggalLahirPengguna', 'TahunMasukPengguna',
        'JenjangSiswa', 'KelasSiswa', 'JurusanSiswa'
    ];

    protected $nullable = [
        'KelayakanUjianSiswa'
    ];

    protected $hidden = [
        'KataSandiPengguna',
        'remember_token',
        'id'
    ];

    protected $foreignKeys = [
        'IDPengguna' => 'IDPengguna'
    ];
    
    public function IDPengguna(){
        return $this->belongsToMany(User::class, $this->foreignKeys['IDPengguna'], 'id');
    }

    public function getForeignKeys(){
        return array_values($this->foreignKeys);
    }

    public function kepemilikan(){
        return $this->belongsToMany(User::class);
    }

    public function mengirimPesan(){
        return $this->hasMany(Pesan::class);
    }

    public function menerimaPesan(){
        return $this->hasMany(Pesan::class);
    }

    public function mendudukiBangku(){
        return $this->hasOne(Kelas::class);
    }

    public function menerimaPengumuman(){
        return $this->hasMany(Pengumuman::class);
    }

    public function membayar(){
        return $this->hasMany(Pembayaran::class);
    }

    public function memeriksaNilaiAkhir(){
        return $this->hasMany(Penilaian::class);
    }

    public function namaDimuat(){
        return $this->belongsToMany(Absensi::class);
    }

    public function mengikutiUjian(){
        return $this->hasMany(Ujian::class);
    }

    public function mengikutiUlanganHarian(){
        return $this->hasMany(UlanganHarian::class);
    }

    public function mendapatMataPelajaran(){
        return $this->hasMany(MataPelajaran::class);
    }

    public function mendapatMateri(){
        return $this->hasMany(Materi::class);
    }
}
