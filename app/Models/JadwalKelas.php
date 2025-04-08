<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;


class JadwalKelas extends Kelas
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "jadwalkelas";
    protected $primaryKey = "id";

    protected $fillable = [
        'WaktuPertemuan',
        'JenisPertemuan',
        'RuangBelajar',
        'PeruntukanKelas',
        'MataPelajaran',
        'NamaGuru',
        'Semester'
    ];

    protected $hidden = [
        'created_at'
    ];

    protected $nullable = [
        'Semester'
    ];

    protected $casts = [
        'id' => 'hashed'
    ];

    protected $foreignKeys = [
        'IDKelas' => 'IDKelas',
        'IDMataPelajaran' => 'IDMataPelajaran',
        'IDPengguna' => 'IDPengguna'
    ];
    
    public function IDKelas(){
        return $this->belongsTo(Kelas::class, $this->foreignKeys['IDKelas'], 'id');
    }
    
    public function IDMataPelajaran(){
        return $this->belongsTo(MataPelajaran::class, $this->foreignKeys['IDMataPelajaran'], 'id');
    }

    public function IDPengguna(){
        return $this->belongsTo(User::class, $this->foreignKeys['IDPengguna'], 'id');
    }

    public function getForeignKeys(){
        return array_values($this->foreignKeys);
    }

    public function milik(){
        return $this->belongsToMany(Kelas::class);
    }

    public function diurus(){
        return $this->belongsTo(User::class);
    }
    
    public function memuatMapel(){
        return $this->hasMany(MataPelajaran::class);
    }

    public function memuatUjian(){
        return $this->hasMany(Ujian::class);
    }

    public function memuatUlanganHarian(){
        return $this->hasMany(UlanganHarian::class);
    }
}