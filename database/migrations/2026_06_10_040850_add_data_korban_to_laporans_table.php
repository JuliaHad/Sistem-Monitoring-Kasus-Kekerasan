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
    Schema::table('laporans', function ($table) {

        $table->integer('usia_korban')->nullable();

        $table->foreignId('kabupaten_kota_id')->nullable();

        $table->foreignId('status_pekerjaan_id')->nullable();

        $table->foreignId('status_perkawinan_id')->nullable();

        $table->foreignId('tempat_kejadian_id')->nullable();

        $table->foreignId('bentuk_kekerasan_id')->nullable();

        $table->foreignId('tingkat_pendidikan_id')->nullable();

    });
}

};
