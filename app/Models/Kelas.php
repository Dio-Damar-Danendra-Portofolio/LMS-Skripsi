<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class Kelas extends Model
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $table = "kelas";
    protected $primaryKey = "id";
    protected $fillable = [
        'NamaKelas',
        'NamaWaliKelas'
    ];

    protected $nullable = [
        'Semester',
        'JumlahSiswa'
    ];

    protected $hidden = [
        'created_at'
    ];
    
    protected $casts = [
        'id' => 'hashed'
    ];

    protected $foreignKeys = [
        'IDPengguna' => 'IDPengguna',
    ];

    public function IDPengguna(){
        return $this->belongsTo(User::class, $this->foreignKeys['IDPengguna'], 'id');
    }

    public function getForeignKeys(){
        return array_values($this->foreignKeys);
    }

    public function memuatSiswa(){
        return $this->hasMany(User::class);
    }
    
    public function memuatWaliKelas(){
        return $this->hasOne(User::class);
    }
}