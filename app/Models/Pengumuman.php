<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class Pengumuman extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="pengumuman";
    protected $primaryKey="id";
    
    protected $fillable = [
        'JudulPengumuman',
        'IsiPengumuman',
        'BerkasPengumuman'
    ];
    
    protected $casts = [
        'id' => 'hashed'
    ];

    protected $foreignKeys = [
        'IDPengguna' => 'IDPengguna'
    ];

    public function IDPengguna(){
        return $this->belongsTo(User::class, $this->foreignKeys['IDPengguna'], 'id');
    }

    public function getForeignKeys(){
        return array_values($this->foreignKeys);
    }

    public function diterimaSiswa(){
        return $this->belongsTo(Siswa::class);
    }

    public function diterimaGuru(){
        return $this->belongsTo(Guru::class);
    }

    public function diunggahAdmin(){
        return $this->belongsTo(Admin::class);
    }
}