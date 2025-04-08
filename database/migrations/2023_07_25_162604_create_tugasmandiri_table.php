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
        Schema::create('tugasmandiri', function (Blueprint $table) {
            $table->id();
            $table->string('JudulSoalTugasMandiri', 255);
            $table->timestamp('TenggatWaktuTugasMandiri');
            $table->binary('BerkasTugasMandiri');
            $table->string('MateriSoal', 255);
            $table->string('PeruntukanKelas', 255);
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
        Schema::dropIfExists('tugasmandiri');
    }
};
