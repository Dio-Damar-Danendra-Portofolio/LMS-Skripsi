<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class Ujian extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $table = "ujian";
    protected $primaryKey = "id";

    protected $fillable = [
        'JenisUjian',
        'RuangUjian',
        'JudulSoalUjian',
        'SoalUjian',
        'NamaGuruMataPelajaran',
        'WaktuUjian',
        'MataPelajaran',
        'PeruntukanKelas',
        'Semester'
    ];

    protected $nullable = [
        'Semester' 
    ];

    protected $foreignKeys = [
        'IDMataPelajaran' => 'IDMataPelajaran',
        'IDPengguna' => 'IDPengguna',
        'IDKelas' => 'IDKelas'
    ];

    protected $casts = [
        'id' => 'hashed'
    ];

    protected $hidden = [
        'created_at'
    ];

    public function IDMataPelajaran(){
        return $this->belongsTo(MataPelajaran::class, $this->foreignKeys['IDMataPelajaran'], 'id');
    }

    public function IDPengguna(){
        return $this->belongsTo(User::class, $this->foreignKeys['IDPengguna'], 'id');
    }

    public function IDKelas(){
        return $this->belongsTo(Kelas::class, $this->foreignKeys['IDKelas'], 'id');
    }

    public function getForeignKeys(){
        return array_values($this->foreignKeys);
    }

    public function diawasi(){
        return $this->belongsTo(Guru::class);
    }

    public function dihadiri(){
        return $this->belongsTo(Siswa::class);
    }

    public function diurus(){
        return $this->belongsTo(Admin::class);
    }

    public function untuk(){
        return $this->hasMany(Kelas::class);
    }

    public function mapel(){
        return $this->belongsTo(MataPelajaran::class);
    }
}