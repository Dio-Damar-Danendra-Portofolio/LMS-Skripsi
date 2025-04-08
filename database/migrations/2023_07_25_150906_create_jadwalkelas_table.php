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
        Schema::create('jadwalkelas', function (Blueprint $table) {
            $table->id();
            $table->timestamp('WaktuPertemuan');
            $table->string('JenisPertemuan', 400);
            $table->string('RuangBelajar', 255);
            $table->string('Semester', 255)->nullable();
            $table->string('PeruntukanKelas', 255);
            $table->string('MataPelajaran', 255);
            $table->string('NamaGuru', 255);
            $table->unsignedBigInteger('IDKelas')->foreignId('IDKelas')->references('id')->on('kelas');
            $table->unsignedBigInteger('IDMataPelajaran')->foreignId('IDMataPelajaran')->references('id')->on('matapelajaran');
            $table->unsignedBigInteger('IDPengguna')->foreignId('IDPengguna')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwalkelas');
    }
};
