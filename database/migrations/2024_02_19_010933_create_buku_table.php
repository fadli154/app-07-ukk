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
        Schema::create('buku', function (Blueprint $table) {
            $table->id('buku_id');
            $table->string('isbn', 20)->nullable();
            $table->string('slug', 255);
            $table->string('judul', 60 );
            $table->string('penulis', 85 );
            $table->string('penerbit', 80 );
            $table->date('tahun_terbit' );
            $table->integer('stok_buku');
            $table->string('sampul_buku', 255);
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
