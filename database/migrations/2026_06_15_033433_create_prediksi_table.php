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
    Schema::create('prediksi', function (Blueprint $table) {

        $table->id();

        $table->foreignId('analisis_id')
              ->constrained('analisis')
              ->onDelete('cascade');

        $table->year('tahun_prediksi');

        $table->integer('hasil_prediksi');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prediksi');
    }
};
