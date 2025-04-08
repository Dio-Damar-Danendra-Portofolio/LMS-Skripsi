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
        Schema::create('forum', function (Blueprint $table) {
            $table->id();
            $table->string('JudulForum', 255);
            $table->string('DeskripsiForum', 255);
            $table->string('PeruntukanKelas', 255);
            $table->unsignedBigInteger('IDMataPelajaran')->foreignId('IDMataPelajaran')->references('id')->on('matapelajaran');
            $table->unsignedBigInteger('IDKelas')->foreignId('IDKelas')->references('id')->on('kelas');
            $table->unsignedBigInteger('IDPengguna')->foreignId('IDPengguna')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forum');
    }
};
