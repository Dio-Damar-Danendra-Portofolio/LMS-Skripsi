<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('NomorIndukPengguna', 255);
            $table->string('NamaPertamaPengguna', 255);
            $table->string('NamaTerakhirPengguna', 255);
            $table->string('SurelPengguna', 255);
            $table->string('PeranPengguna', 255);
            $table->string('KataSandiPengguna', 255)->unique();
            $table->string('NomorPonselPengguna', 255);
            $table->date('TanggalLahirPengguna');
            $table->string('FotoProfilPengguna')->nullable();
            $table->string('TahunMasukPengguna');
            // $table->string('PencarianKelas', 255)->nullable();
            // $table->string('JenjangSiswa', 255)->nullable();
            // $table->string('KelasSiswa', 255)->nullable();
            // $table->string('JurusanSiswa', 255)->nullable();
            // $table->string('KelayakanUjianSiswa', 255)->nullable();
            // $table->string('MataPelajaran', 255)->nullable();
            // $table->string('MataPelajaran2', 255)->nullable();
            // $table->string('MataPelajaran3', 255)->nullable();
            // $table->string('MataPelajaran4', 255)->nullable();
            // $table->string('DivisiAdmin', 255)->nullable();
            // $table->string('UangyangDibayar', 255)->nullable();
            // $table->string('Semester')->nullable();
            $table->timestamp('last_seen');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
