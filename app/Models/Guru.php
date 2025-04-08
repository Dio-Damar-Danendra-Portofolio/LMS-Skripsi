<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class Guru extends User
{
    use HasFactory, Notifiable, HasApiTokens;
    
    protected $table = "users";
    protected $primaryKey = "id";

    protected $fillable = [
        'NamaPertamaPengguna', 'NamaTerakhirPengguna', 'NomorIndukPengguna', 'PeranPengguna',
        'SurelPengguna', 'NomorPonselPengguna', 'TanggalLahirPengguna', 'TahunMasukPengguna',
        'MataPelajaran'
    ];

    protected $nullable = [
        'MataPelajaran2',
        'MataPelajaran3',
        'MataPelajaran4'
    ];
    
    protected $casts = [
        'id' => 'hashed'
    ];

    public function mengajar(){
        return $this->hasMany(MataPelajaran::class);
    }

    public function mengawasi(){
        return $this->hasMany(Ujian::class);
    }

    public function mengirim(){
        return $this->hasMany(Pesan::class);
    }

    public function menerima(){
        return $this->hasMany(Pesan::class);
    }

    public function membuatThread(){
        return $this->hasMany(Thread::class);
    }

    public function membuatTugasMandiri(){
        return $this->hasMany(TugasMandiri::class);
    }

    public function membuatUlanganHarian(){
        return $this->hasMany(UlanganHarian::class);
    }

}