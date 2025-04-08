<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class Daftar extends User
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $table = "users";
    protected $primaryKey = "id";
    protected $fillable = [
        'NamaPertamaPengguna', 'NamaTerakhirPengguna', 'NomorIndukPengguna', 'PeranPengguna',
        'SurelPengguna', 'NomorPonselPengguna', 'TanggalLahirPengguna', 'TahunMasukPengguna'
    ];

    protected $casts = [
        'id' => 'hashed'
    ];

    protected $nullable = [
        'FotoProfilPengguna', 
        'Semester',
        'PencarianKelas',
        'KelayakanUjianSiswa'
    ];

    protected $hidden = [
        'KataSandiPengguna',
        'remember_token'
    ];
}
