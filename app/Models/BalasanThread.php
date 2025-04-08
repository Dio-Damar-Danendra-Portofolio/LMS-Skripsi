<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class BalasanThread extends Model
{
    use HasFactory;

    protected $table = "balasanthread";
    protected $primaryKey = "id";

    protected $fillable = [
        'IsiBalasan',
        'BerkasBalasanThread'
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
        'IDThread' => 'IDThread'
    ];

    public function IDPengguna(){
        return $this->belongsTo(User::class, $this->foreignKeys['IDPengguna'], 'id');
    }

    public function IDThread(){
        return $this->belongsTo(Thread::class, $this->foreignKeys['IDThread'], 'id');
    }

    public function getForeignKeys(){
        return array_values($this->foreignKeys);
    }

    public function membalas(){
        return $this->belongsTo(Thread::class);
    }

    public function dibuatOleh(){
        return $this->belongsTo(User::class);
    }

    public function terkandungDalam(){
        return $this->belongsToMany(Forum::class);
    }
}
