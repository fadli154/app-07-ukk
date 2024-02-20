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
        Schema::create('ulasan', function (Blueprint $table) {
            $table->id('ulasan_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users')->cascadeOnDelete();
            $table->unsignedBigInteger('buku_id');
            $table->foreign('buku_id')->references('buku_id')->on('buku')->cascadeOnDelete();
            $table->string('ulasan', 200)->nullable();
            $table->enum('rating', ['1', '2', '3', '4', '5']);
            $table->string('foto_ulasan', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasans');
    }
};
