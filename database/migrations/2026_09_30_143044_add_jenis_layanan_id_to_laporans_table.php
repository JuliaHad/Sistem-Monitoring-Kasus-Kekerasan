<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('laporans', function (Blueprint $table) {
            $table->foreignId('jenis_layanan_id')
                ->nullable()
                ->after('tingkat_pendidikan_id')
                ->constrained('jenis_layanans')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('laporans', function (Blueprint $table) {
            $table->dropForeign(['jenis_layanan_id']);
            $table->dropColumn('jenis_layanan_id');
        });
    }
};