<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peristiwa_grj', function (Blueprint $table) {
            $table->id('id_peristiwa_grj');
            $table->foreignId('id_jemaat')->constrained('jemaat', 'id_jemaat')->onDelete('cascade');
            $table->enum('jenis', ['baptis', 'sidi', 'nikah']);
            $table->year('tahun');
            $table->text('deskripsi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peristiwa_grj');
    }
};
