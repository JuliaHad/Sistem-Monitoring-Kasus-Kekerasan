<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bentuk_kekerasan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kekerasan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bentuk_kekerasan');
    }
};