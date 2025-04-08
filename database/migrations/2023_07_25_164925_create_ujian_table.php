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
        Schema::create('ujian', function (Blueprint $table) {
            $table->id();
            $table->string('JenisUjian', 255);
            $table->string('RuangUjian', 255);
            $table->string('JudulSoalUjian', 255);
            $table->string('Semester', 255)->nullable();
            $table->binary('SoalUjian');
            $table->timestamp('WaktuUjian');
            $table->string('NamaGuruMataPelajaran', 255);
            $table->string('MataPelajaran', 255);
            $table->string('PeruntukanKelas', 255);
            $table->boolean('is_active');
            $table->unsignedBigInteger('IDPengguna')->foreignId('IDPengguna')->references('id')->on('users');
            $table->unsignedBigInteger('IDKelas')->foreignId('IDKelas')->references('id')->on('kelas');
            $table->unsignedBigInteger('IDMataPelajaran')->foreignId('IDMataPelajaran')->references('id')->on('matapelajaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ujian');
    }
};
