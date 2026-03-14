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
        Schema::create('pekerjaan', function (Blueprint $table) {
            $table->id('id_pekerjaan');
            $table->foreignId('id_jemaat')->constrained('jemaat', 'id_jemaat')->onDelete('cascade');
            $table->string('jenis_pekerjaan', 50)->nullable();
            $table->string('instansi', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjaan');
    }
};
