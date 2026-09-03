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
        Schema::create('lampiran_bank_data', function (Blueprint $table) {
            $table->id();

            $table->foreignId('bank_data_id')
                ->constrained('bank_data')
                ->cascadeOnDelete();

            $table->string('file_name');
            $table->string('file_path', 500);
            $table->string('file_type', 100)->nullable();
            $table->unsignedBigInteger('file_size')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lampiran_bank_data');
    }
};
