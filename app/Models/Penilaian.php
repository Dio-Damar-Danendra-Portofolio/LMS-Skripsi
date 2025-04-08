<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class Penilaian extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "penilaian";
    protected $primaryKey = "id";

    protected $fillable = [
        'NilaiAkhir',
        'NilaiAkhirDalamHuruf',
        'NilaiUAS',
        'NilaiUTS',
        'NilaiTugasMandiri',
        'NilaiKehadiran',
        'NilaiUlanganHarian'
        ];

    protected $hidden = [
        'id'
    ];

    protected $casts = [
        'id' => 'hashed'
    ];

    protected $nullable = [
        'Semester'
    ];

    protected $foreignKeys = [
        'IDUjian' => 'IDUjian',
        'IDPengguna' => 'IDPengguna'
    ];

    public function IDUjian(){
        return $this->belongsTo(Ujian::class, $this->foreignKeys['IDUjian'], 'id');
    }

    public function IDPengguna(){
        return $this->belongsTo(User::class, $this->foreignKeys['IDPengguna'], 'id');
    }

    public function getForeignKeys(){
        return array_values($this->foreignKeys);
    }
    
    public function dimiliki(){
        return $this->belongsTo(User::class);
    }

    public function dihitung(){
        return $this->belongsTo(User::class);
    }
}
