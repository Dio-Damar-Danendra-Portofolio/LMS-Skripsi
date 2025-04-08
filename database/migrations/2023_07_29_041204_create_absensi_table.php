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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->boolean('StatusKehadiran');
            $table->string('PenyebabKetidakHadiran', 255);
            $table->timestamp('WaktuCheckIn');
            $table->boolean('StatusKeterlambatan');
            $table->string('PenyebabKeterlambatan', 255);
            $table->string('Semester', 255)->nullable();
            $table->string('SesiMateri', 255)->nullable();
            $table->boolean('is_active');
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
        Schema::dropIfExists('absensi');
    }
};
