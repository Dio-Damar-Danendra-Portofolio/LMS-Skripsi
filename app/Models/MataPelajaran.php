<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class MataPelajaran extends Model
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = "matapelajaran";
    protected $primaryKey = "id";

    protected $fillable = [
        'NamaMataPelajaran',
        'NamaGuru',
        'KelompokMataPelajaran',
        'PeruntukanKelas'
    ];

    protected $nullable = [
        'Semester'
    ];

    protected $casts = [
        'id' => 'hashed'
    ];

    protected $foreignKeys = [
        'IDPengguna' => 'IDPengguna',
        'IDKelas' => 'IDKelas'
    ];

    public function IDPengguna(){
        return $this->belongsTo(User::class, $this->foreignKeys['IDPengguna'], 'id');
    }
    
    public function IDKelas(){
        return $this->belongsTo(Kelas::class, $this->foreignKeys['IDKelas'], 'id');
    }

    public function getForeignKeys(){
        return array_values($this->foreignKeys);
    }

    public function ujian(){
        return $this->hasMany(Ujian::class);
    }

    public function ulanganHarian(){
        return $this->hasMany(UlanganHarian::class);
    }

    public function tugasMandiri(){
        return $this->hasMany(TugasMandiri::class);
    }

    public function forum(){
        return $this->hasMany(Forum::class);
    }
}