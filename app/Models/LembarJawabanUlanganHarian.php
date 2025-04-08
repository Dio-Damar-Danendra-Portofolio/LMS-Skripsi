<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LembarJawabanUlanganHarian extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "lembarjawabanulanganharian";
    protected $primaryKey = "id";
    
    protected $fillable = [
        'JudulLembarJawabanUlanganHarian', 
        'BerkasLembarJawabanUlanganHarian'
    ];

    protected $casts = [
        'id' => 'hashed'
    ];

    protected $hidden = [
        'created_at'
    ];

    protected $foreignKeys = [
        'IDPengguna' => 'IDPengguna',
        'IDUlanganHarian' => 'IDUlanganHarian'
    ];

    public function IDPengguna(){
        return $this->belongsTo(Pengguna::class, $this->foreignKeys['IDPengguna'], 'id');
    }

    public function IDUlanganHarian(){
        return $this->belongsTo(UlanganHarian::class, $this->foreignKeys['IDUlanganHarian'], 'id');
    }

    public function getForeignKeys(){
        return array_values($this->foreignKeys);
    }

    public function diunggah(){
        return $this->belongsTo(Siswa::class);
    }

    public function peruntukan(){
        return $this->belongsToMany(UlanganHarian::class);
    }

}
