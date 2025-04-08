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
        Schema::create('materi', function (Blueprint $table) {
            $table->id();
            $table->binary('BerkasMateri');
            $table->string('KIdanKDMateri', 255);
            $table->string('JudulMateri', 255);
            $table->string('KataKunci', 255);
            $table->string('TautanZOOM', 400)->unique();
            $table->string('PeruntukanKelas', 255);
            $table->timestamp('WaktuPertemuan');
            $table->unsignedBigInteger('IDMataPelajaran')->foreignId('IDMataPelajaran')->references('id')->on('matapelajaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materi');
    }
};
