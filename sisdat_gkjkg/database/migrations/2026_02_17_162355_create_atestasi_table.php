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
        Schema::create('atestasi', function (Blueprint $table) {
            $table->id('id_atestasi');
            $table->foreignId('id_jemaat')->constrained('jemaat', 'id_jemaat')->onDelete('cascade');
            $table->foreignId('id_gereja_asal')->nullable()->constrained('gereja', 'id_gereja')->onDelete('set null');
            $table->foreignId('id_gereja_tujuan')->nullable()->constrained('gereja', 'id_gereja')->onDelete('set null');
            $table->enum('keterangan', ['masuk', 'keluar']);
            $table->year('tahun');
            $table->text('deskripsi_ats')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atestasi');
    }
};
