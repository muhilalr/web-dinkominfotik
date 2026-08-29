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
        Schema::create('link_eksternals', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('gambar', 500)->nullable();
            $table->string('url', 500);
            $table->enum('tipe', ['pemerintah', 'layanan'])->default('pemerintah');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('link_eksternals');
    }
};
