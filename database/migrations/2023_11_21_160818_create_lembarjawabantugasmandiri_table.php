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
        Schema::create('lembarjawabantugasmandiri', function (Blueprint $table) {
            $table->id();
            $table->string('JudulLembarJawabanTugasMandiri', 255);
            $table->binary('BerkasLembarJawabanTugasMandiri');
            $table->unsignedBigInteger('IDTugasMandiri')->foreignId('IDTugasMandiri')->references('id')->on('tugasmandiri');
            $table->unsignedBigInteger('IDPengguna')->foreignId('IDPengguna')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lembarjawabantugasmandiri');
    }
};
