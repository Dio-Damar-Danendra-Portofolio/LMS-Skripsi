<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class Materi extends Model
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = "materi";
    protected $primaryKey = "id";

    protected $fillable = [
        'JudulMateri',
        'KIdanKDMateri',
        'BerkasMateri',
        'KataKunci',
        'TautanZOOM',
        'WaktuPertemuan',
        'PeruntukanKelas'
    ];

    protected $casts = [
        'id' => 'hashed'
    ];

    protected $hidden = [
        'PeruntukanKelas'
    ];

    protected $foreignKeys = [
        'IDMataPelajaran' => 'IDMataPelajaran',
        'IDPengguna' => 'IDPengguna'
    ];

    public function IDMataPelajaran(){
        return $this->belongsTo(MataPelajaran::class, $this->foreignKeys['IDMataPelajaran'], 'id');
    }

    public function IDPengguna(){
        return $this->belongsTo(User::class, $this->foreignKeys['IDPengguna'], 'id');
    }

    public function getForeignKeys(){
        return array_values($this->foreignKeys);
    }

    public function terkandungDalam(){
        return $this->belongsTo(MataPelajaran::class);
    }

    public function ditambahkan(){
        return $this->belongsTo(User::class);
    }
}
