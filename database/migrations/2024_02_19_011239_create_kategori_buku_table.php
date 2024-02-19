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
        Schema::create('kategori_buku', function (Blueprint $table) {
            $table->id('kategori_buku_id');
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')->references('kategori_id')->on('kategori')->cascadeOnDelete();
            $table->unsignedBigInteger('buku_id');
            $table->foreign('buku_id')->references('buku_id')->on('buku')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_buku');
    }
};