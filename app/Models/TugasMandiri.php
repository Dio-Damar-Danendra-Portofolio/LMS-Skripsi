<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class TugasMandiri extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "tugasmandiri";
    protected $primarykey = "id";

    protected $fillable = [
        'JudulSoalTugasMandiri',
        'TenggatWaktuTugasMandiri',
        'BerkasTugasMandiri',
        'MateriSoal',
        'PeruntukanKelas'
    ];

    protected $hidden = [
        'created_at'
    ];

    protected $casts = [
        'id' => 'hashed'
    ];

    protected $foreignKeys = [
        'IDPengguna' => 'IDPengguna',
        'IDMataPelajaran' => 'IDMataPelajaran'
    ];

    public function IDPengguna(){
        return $this->belongsTo(User::class, $this->foreignKeys['IDPengguna'], 'id');
    }

    public function IDMataPelajaran(){
        return $this->belongsTo(MataPelajaran::class, $this->foreignKeys['IDMataPelajaran'], 'id');
    }    
    
    public function getForeignKeys(){
        return array_values($this->foreignKeys);
    }

    public function bagianDari(){
        return $this->belongsTo(MataPelajaran::class);
    }

    public function dibuatOleh(){
        return $this->belongsTo(User::class);
    }
}
