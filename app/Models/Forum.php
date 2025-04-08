<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class Forum extends Model
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $table = "forum";
    protected $primaryKey = "id";
    
    protected $fillable = [
        'JudulForum',
        'DeskripsiForum',
        'PeruntukanKelas'
    ];

    protected $hidden = [
        'created_at'
    ];

    protected $casts = [
        'id' => 'hashed'
    ];


    protected $foreignKeys = [
        'IDMataPelajaran' => 'IDMataPelajaran',
        'IDKelas' => 'IDKelas',
        'IDPengguna' => 'IDPengguna'
    ];

    public function IDMataPelajaran(){
        return $this->belongsTo(MataPelajaran::class, $this->foreignKeys['IDMataPelajaran'], 'id');
    }
    
    public function IDKelas(){
        return $this->belongsTo(Kelas::class, $this->foreignKeys['IDKelas'], 'id');
    }

    public function IDPengguna(){
        return $this->belongsTo(User::class, $this->foreignKeys['IDPengguna'], 'id');
    }
    
    public function getForeignKeys(){
        return array_values($this->foreignKeys);
    }

    public function pengirim(){
        return $this->belongsToMany(Guru::class);
    }

    public function penerima(){
        return $this->belongsToMany(Siswa::class);
    }

    public function memuat(){
        return $this->hasMany(Thread::class);
    }
    
    public function mapel(){
        return $this->belongsTo(MataPelajaran::class);
    }
}