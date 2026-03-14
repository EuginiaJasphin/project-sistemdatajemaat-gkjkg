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
        Schema::create('jemaat', function (Blueprint $table) {
            $table->id('id_jemaat');
            $table->foreignId('id_gereja')->nullable()->constrained('gereja', 'id_gereja')->onDelete('set null');
            $table->string('nama_lengkap', 50);
            $table->string('nama_panggilan', 20)->nullable();
            $table->enum('gender', ['L', 'P'])->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->enum('gol_darah', ['A', 'B', 'AB', 'O'])->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_telepon', 13)->nullable();
            $table->string('email', 50)->nullable();
            $table->enum('status_jemaat', ['aktif', 'nonaktif', 'pindah'])->default('aktif');
            $table->string('foto', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jemaat');
    }
};
