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
    Schema::create('monitoring', function (Blueprint $table) {
        $table->id();

        $table->foreignId('laporan_id')
              ->constrained('laporans')
              ->onDelete('cascade');

        $table->year('tahun');

        $table->integer('total_kasus')->default(0);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitoring');
    }
};
