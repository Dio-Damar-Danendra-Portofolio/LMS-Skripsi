<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LembarJawabanUjian extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "lembarjawabanujian";
    protected $primaryKey = "id";
    
    protected $fillable = [
        'JudulLembarJawabanUjian', 
        'BerkasLembarJawabanUjian'
    ];

    protected $casts = [
        'id' => 'hashed'
    ];

    protected $hidden = [
        'created_at'
    ];

    protected $foreignKeys = [
        'IDPengguna' => 'IDPengguna',
        'IDUjian' => 'IDUjian'
    ];

    public function IDPengguna(){
        return $this->belongsTo(Pengguna::class, $this->foreignKeys['IDPengguna'], 'id');
    }

    public function IDUjian(){
        return $this->belongsTo(Ujian::class, $this->foreignKeys['IDUjian'], 'id');
    }

    public function getForeignKeys(){
        return array_values($this->foreignKeys);
    }

    public function diunggah(){
        return $this->belongsTo(Siswa::class);
    }

    public function peruntukan(){
        return $this->belongsToMany(Ujian::class);
    }
}