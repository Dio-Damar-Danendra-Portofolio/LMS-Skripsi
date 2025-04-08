<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class Pesan extends Chat
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="pesan";
    protected $primaryKey="id";
    
    protected $fillable = [
        'Terkirim',
        'IsiPesan',
        'Terbaca'
    ];

    protected $hidden = [
        'id'
    ];

    protected $casts = [
        'id' => 'hashed'
    ];

    protected $nullable = [
        'BerkasPesan'
    ];

    protected $foreignKeys = [
        'IDPengguna' => 'IDPengguna',
        'IDChat' => 'IDChat'
    ];

    public function IDPengguna(){
        return $this->belongsTo(User::class, $this->foreignKeys['IDPengguna'], 'id');
    }
    
    public function IDChat(){
        return $this->belongsTo(Chat::class, $this->foreignKeys['IDChat'], 'id');
    }
    
    public function getForeignKeys(){
        return array_values($this->foreignKeys);
    }

    public function terkandungDalam(){
        return $this->belongsTo(Chat::class);
    }

    public function dikirimDanDiterima(){
        return $this->belongsToMany(User::class);
    }  
}
