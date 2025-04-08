<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class Thread extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "thread";
    protected $primarykey = "id";

    protected $fillable = [
        'JudulThread',
        'IsiThread'
    ];

    protected $nullable = [
        'BerkasThread'
    ];

    protected $casts = [
        'id' => 'hashed'
    ];

    protected $hidden = [
        'created_at'
    ];

    protected $foreignKeys = [
        'IDPengguna' => 'IDPengguna',
        'IDForum' => 'IDForum'
    ];

    public function IDPengguna(){
        return $this->belongsTo(User::class, $this->foreignKeys['IDPengguna'], 'id');
    }

    public function IDForum(){
        return $this->belongsTo(Forum::class, $this->foreignKeys['IDForum'], 'id');
    }

    public function getForeignKeys(){
        return array_values($this->foreignKeys);
    }

    public function terkandungDalam(){
        return $this->belongsTo(Forum::class);
    }

    public function ditulis(){
        return $this->belongsTo(User::class);
    }
}
