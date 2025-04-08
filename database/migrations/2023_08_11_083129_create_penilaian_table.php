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
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();
            $table->float('NilaiAkhir');
            $table->string('NilaiAkhirDalamHuruf', 255);
            $table->string('Semester', 255)->nullable();
            $table->float('NilaiUAS');
            $table->float('NilaiUTS');
            $table->float('NilaiKehadiran');
            $table->float('NilaiUlanganHarian');
            $table->float('NilaiTugasMandiri');
            $table->unsignedBigInteger('IDKelas')->foreignId('IDKelas')->references('id')->on('kelas');
            $table->unsignedBigInteger('IDPengguna')->foreignId('IDPengguna')->references('id')->on('users');
            $table->unsignedBigInteger('IDUjian')->foreignId('IDUjian')->references('id')->on('ujian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian');
    }
};
