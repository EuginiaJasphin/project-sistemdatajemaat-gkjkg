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
        Schema::create('aggt_keluarga', function (Blueprint $table) {
            $table->string('id_aggt_keluarga', 16)->primary();
            $table->foreignId('id_jemaat')->constrained('jemaat', 'id_jemaat')->onDelete('cascade');
            $table->string('no_kk_gereja', 16);
            $table->foreign('no_kk_gereja')->references('no_kk_gereja')->on('keluarga')->onDelete('cascade');
            $table->enum('status_dalam_keluarga', ['kepala', 'istri', 'anak', 'lainnya'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aggt_keluarga');
    }
};
