<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class Pembayaran extends Model
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = "pembayaran";
    protected $primaryKey = "id";

    protected $fillable = [
        'TanggalPembayaran',
        'JenisPembayaran',
        'StatusPembayaran',
        'NominalPembayaran',
        'SisaPembayaran',
        'NamaPembayaran'
    ];

    protected $foreignKeys = [
        'IDPengguna' => 'IDPengguna'
    ];

    public function IDPengguna(){
        return $this->belongsTo(User::class, $this->foreignKeys['IDPengguna'], 'id');
    }

    public function getForeignKeys(){
        return array_values($this->foreignKeys);
    }

    public function dibayar(){
        return $this->belongsToMany(User::class);
    }

    public function diunggah(){
        return $this->belongsTo(User::class);
    }

    public function diurus(){
        return $this->belongsTo(User::class);
    }
}
