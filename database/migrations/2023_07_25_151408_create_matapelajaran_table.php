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
        Schema::create('matapelajaran', function (Blueprint $table) {
            $table->id();
            $table->string('NamaMataPelajaran', 255);
            $table->string('KelompokMataPelajaran', 255);
            $table->string('Semester', 255)->nullable();
            $table->integer('JumlahMateri');
            $table->string('PeruntukanKelas', 255);
            $table->string('NamaGuru', 255);
            $table->boolean('is_active');
            $table->unsignedBigInteger('IDPengguna')->foreignId('IDPengguna')->references('id')->on('users');
            $table->unsignedBigInteger('IDKelas')->foreignId('IDKelas')->references('id')->on('kelas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matapelajaran');
    }
};
