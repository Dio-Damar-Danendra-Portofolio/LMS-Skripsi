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
        Schema::create('ulanganharian', function (Blueprint $table) {
            $table->id();
            $table->string('JudulSoalUlanganHarian', 255);
            $table->string('JenisUlanganHarian', 255);
            $table->timestamp('WaktuUlanganHarian');
            $table->binary('SoalUlanganHarian');
            $table->string('PeruntukanKelas', 255);
            $table->unsignedBigInteger('IDMataPelajaran')->foreignId('IDMataPelajaran')->references('id')->on('matapelajaran');
            $table->unsignedBigInteger('IDMateri')->foreignId('IDMateri')->references('id')->on('materi');
            $table->unsignedBigInteger('IDPengguna')->foreignId('IDPengguna')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulanganharian');
    }
};