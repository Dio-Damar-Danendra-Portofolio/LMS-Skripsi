<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class Absensi extends Model
{
    use HasFactory;
    protected $table = "absensi";
    protected $primaryKey = "id";
    
    protected $fillable = [
        'StatusKehadiran',
        'StatusKeterlambatan',
        'WaktuCheckIn',
        'PenyebabKetidakHadiran',
        'PenyebabKeterlambatan'
    ];

    protected $nullable = [
        'Semester',
        'SesiMateri'
    ];

    protected $hidden = [
        'created_at',
        'id'
    ];

    protected $casts = [
        'id' => 'hashed'
    ];

    protected $foreignKeys = [
        'IDPengguna' => 'IDPengguna',
        'IDMataPelajaran' => 'IDMataPelajaran'
    ];

    public function IDPengguna(){
        return $this->belongsToMany(User::class, $this->foreignKeys['IDPengguna'], 'id');
    }

    public function IDMataPelajaran(){
        return $this->belongsTo(MataPelajaran::class, $this->foreignKeys['IDMataPelajaran'], 'id');
    }

    public function getForeignKeys(){
        return array_values($this->foreignKeys);
    }

    public function absen(){
        return $this->belongsTo(Guru::class);
    }

    public function memuatNama(){
        return $this->hasMany(Siswa::class);
    }

    public function peruntukan(){
        return $this->belongsTo(MataPelajaran::class);
    }

    public function direkap(){
        return $this->belongsTo(Guru::class);
    }
}
