<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LembarJawabanTugasMandiri extends Model
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = "lembarjawabantugasmandiri";
    protected $primaryKey = "id";

    protected $fillable = [
        'JudulLembarJawabanTugasMandiri',
        'BerkasLembarJawabanTugasMandiri'
    ];

    protected $casts = [
        'id' => 'hashed'
    ];

    protected $hidden = [
        'created_at'
    ];

    protected $foreignKeys = [
        'IDPengguna' => 'IDPengguna',
        'IDTugasMandiri' => 'IDTugasMandiri'
    ];

    public function IDPengguna(){
        return $this->belongsTo(Pengguna::class, $this->foreignKeys['IDPengguna'], 'id');
    }

    public function IDTugasMandiri(){
        return $this->belongsTo(TugasMandiri::class, $this->foreignKeys['IDTugasMandiri'], 'id');
    }

    public function getForeignKeys(){
        return array_values($this->foreignKeys);
    }

    public function diunggah(){
        return $this->belongsTo(Siswa::class);
    }

    public function peruntukan(){
        return $this->belongsToMany(TugasMandiri::class);
    }

}