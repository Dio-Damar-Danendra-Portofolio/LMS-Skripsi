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
        Schema::create('balasanthread', function (Blueprint $table) {
            $table->id();
            $table->string('IsiBalasan', 255); 
            $table->binary('BerkasBalasanThread');
            $table->unsignedBigInteger('IDSiswa')->foreignId('IDSiswa')->references('id')->on('siswa');
            $table->unsignedBigInteger('IDThread')->foreignId('IDThread')->references('id')->on('thread');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balasanthread');
    }
};
