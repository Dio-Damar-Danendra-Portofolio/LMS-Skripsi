<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class UlanganHarian extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "ulanganharian";
    protected $primaryKey = "id";

    protected $fillable = [
        'JenisUlanganHarian',
        'JudulSoalUlanganHarian',
        'WaktuUlanganHarian',
        'SoalUlanganHarian',
        'PeruntukanKelas'
    ];

    protected $casts = [
        'id' => 'hashed'
    ];

    protected $foreignKeys = [
        'IDMataPelajaran' => 'IDMataPelajaran',
        'IDMateri' => 'IDMateri',
        'IDPengguna' => 'IDPengguna'
    ];

    public function IDMataPelajaran(){
        return $this->belongsTo(MataPelajaran::class, $this->foreignKeys['IDMataPelajaran'], 'id');
    }

    public function IDMateri(){
        return $this->belongsTo(Materi::class, $this->foreignKeys['IDMateri'], 'id');
    }

    public function IDPengguna(){
        return $this->belongsTo(User::class, $this->foreignKeys['IDPengguna'], 'id');
    }

    public function getForeignKeys(){
        return array_values($this->foreignKeys);
    }
    
    public function merupakanUnsurDari(){
        return $this->belongsToMany(MataPelajaran::class);
    }

    public function memuatBeberapa(){
        return $this->hasMany(Materi::class);
    }

    public function diurus(){
        return $this->belongsTo(Guru::class);
    }
}
