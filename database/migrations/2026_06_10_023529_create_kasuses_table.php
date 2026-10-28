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
    Schema::create('kasus', function (Blueprint $table) {

        $table->id();

        $table->unsignedBigInteger('laporan_id');
        $table->unsignedBigInteger('kabupaten_kota_id');
        $table->unsignedBigInteger('status_pekerjaan_id');
        $table->unsignedBigInteger('status_perkawinan_id');
        $table->unsignedBigInteger('tempat_kejadian_id');
        $table->unsignedBigInteger('bentuk_kekerasan_id');
        $table->unsignedBigInteger('tingkat_pendidikan_id');
        $table->unsignedBigInteger('jenis_layanan_id');

        $table->integer('usia_korban');

        $table->timestamps();

        $table->foreign('laporan_id')
            ->references('id')
            ->on('laporans')
            ->onDelete('cascade');

        $table->foreign('kabupaten_kota_id')
            ->references('id')
            ->on('kabupaten_kota')
            ->onDelete('cascade');

        $table->foreign('status_pekerjaan_id')
            ->references('id')
            ->on('status_pekerjaan')
            ->onDelete('cascade');

        $table->foreign('status_perkawinan_id')
            ->references('id')
            ->on('status_perkawinan')
            ->onDelete('cascade');

        $table->foreign('tempat_kejadian_id')
            ->references('id')
            ->on('tempat_kejadian')
            ->onDelete('cascade');

        $table->foreign('bentuk_kekerasan_id')
            ->references('id')
            ->on('bentuk_kekerasan')
            ->onDelete('cascade');

        $table->foreign('tingkat_pendidikan_id')
            ->references('id')
            ->on('tingkat_pendidikan')
            ->onDelete('cascade');

        $table->foreign('jenis_layanan_id')
            ->references('id')
            ->on('jenis_layanan')
            ->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kasus');
    }
};