<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends User
{
    use HasFactory;

    protected $table = "users";
    protected $primaryKey = "id";

    protected $fillable = [
        'NamaPertamaPengguna', 'NamaTerakhirPengguna', 'NomorIndukPengguna', 'PeranPengguna',
        'SurelPengguna', 'NomorPonselPengguna', 'TanggalLahirPengguna', 'TahunMasukPengguna',
        'DivisiAdmin'
    ];

    protected $hidden = [
        'created_at'
    ];

    public function mengurusPengumuman(){
        return $this->hasMany(Pengumuman::class);
    }

    public function mengurusPembayaran(){
        return $this->hasMany(Pembayaran::class);
    }

    public function mengurusJadwalKelas(){
        return $this->hasMany(JadwalKelas::class);
    }

    public function mengurusKelas(){
        return $this->hasMany(Kelas::class);
    }

    public function mengurusMataPelajaran(){
        return $this->hasMany(MataPelajaran::class);
    }

    public function mengurusUjian(){
        return $this->hasMany(Ujian::class);
    }

    public function mengirimPesan(){
        return $this->hasMany(Pesan::class);
    }

    public function menerimaPesan(){
        return $this->hasMany(Pesan::class);
    }
}
