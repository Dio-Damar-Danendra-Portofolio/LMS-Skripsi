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
        Schema::create('lembarjawabanulanganharian', function (Blueprint $table) {
            $table->id();
            $table->string('JudulLembarJawabanUlanganHarian', 255);
            $table->binary('BerkasLembarJawabanUlanganHarian');
            $table->unsignedBigInteger('IDUlanganHarian')->foreignId('IDUlanganHarian')->references('id')->on('ulanganharian');
            $table->unsignedBigInteger('IDPengguna')->foreignId('IDPengguna')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lembarjawabanulanganharian');
    }
};
