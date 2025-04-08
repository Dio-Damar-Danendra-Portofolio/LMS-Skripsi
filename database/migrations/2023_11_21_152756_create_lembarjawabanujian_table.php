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
        Schema::create('lembarjawabanujian', function (Blueprint $table) {
            $table->id();
            $table->string('JudulLembarJawabanUjian', 255);
            $table->string('BerkasLembarJawabanUjian', 255);
            $table->unsignedBigInteger('IDUjian')->foreignId('IDUjian')->references('id')->on('ujian');
            $table->unsignedBigInteger('IDPengguna')->foreignId('IDPengguna')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lembarjawabanujian');
    }
};
