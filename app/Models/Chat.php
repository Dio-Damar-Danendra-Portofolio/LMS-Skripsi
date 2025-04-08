<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class Chat extends Model
{
    use HasFactory;

    protected $table = "chat";
    protected $primaryKey = "id";
    
    protected $fillable = [
        'Terbaca',
        'WaktuPesanTerakhir'
    ];

    protected $casts = [
        'id' => 'hashed'
    ];

    protected $hidden = [
        'created_at',
        'id'
    ];

    protected $foreignKeys = [
        'IDPengguna' => 'IDPengguna',
        'IDPesan' => 'IDPesan'
    ];

    public function IDPengguna(){
        return $this->belongsTo(User::class, $this->foreignKeys['IDPengguna'], 'id');
    }

    public function IDPesan(){
        return $this->hasMany(Pesan::class, $this->foreignKeys['IDPesan'], 'id');
    }

    public function getForeignKeys(){
        return array_values($this->foreignKeys);
    }

    public function berisi(){
        return $this->hasMany(Pesan::class);
    }

    public function digunakanUntukMengirimPesan(){
        return $this->hasMany(User::class);
    }
}
