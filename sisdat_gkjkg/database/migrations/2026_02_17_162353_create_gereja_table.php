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
        Schema::create('gereja', function (Blueprint $table) {
            $table->id('id_gereja');
            $table->string('nama_gereja', 150);
            $table->string('kota', 40)->nullable();
            $table->string('provinsi', 40)->nullable();
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gereja');
    }
};
