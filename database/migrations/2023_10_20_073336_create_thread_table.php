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
        Schema::create('thread', function (Blueprint $table) {
            $table->id();
            $table->string('JudulThread', 255);
            $table->string('IsiThread', 1000);
            $table->binary('BerkasThread')->nullable();
            $table->unsignedBigInteger('IDPengguna')->foreignId('IDPengguna')->references('id')->on('users');
            $table->unsignedBigInteger('IDForum')->foreignId('IDForum')->references('id')->on('forum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thread');
    }
};
