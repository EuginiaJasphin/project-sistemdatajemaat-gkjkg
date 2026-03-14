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
        Schema::create('pendidikan', function (Blueprint $table) {
            $table->id('id_pendidikan');
            $table->foreignId('id_jemaat')->constrained('jemaat', 'id_jemaat')->onDelete('cascade');
            $table->enum('jenjang', ['tidak_sekolah', 'paud', 'sd', 'smp', 'sma', 'd3', 's1', 's2', 's3']);
            $table->string('jurusan', 50)->nullable();
            $table->string('nama_sekolah', 100)->nullable();
            $table->year('tahun_lulus')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendidikan');
    }
};
