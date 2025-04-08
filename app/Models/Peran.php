<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class Peran extends Model
{
    use HasFactory;

    protected $table = "peran";
    protected $primaryKey = "id";
    public $fillable = [
        'nama_peran'
    ];

    public function pemilik(){
        return $this->belongsToMany(User::class, 'id_pengguna', 'id');
    }
}
