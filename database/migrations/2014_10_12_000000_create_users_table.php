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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('name', 85);
            $table->string('username', 50);
            $table->string('email')->unique();
            $table->enum('roles', ['admin', 'petugas', 'peminjam']);
            $table->string('no_telepon', 13);
            $table->date('tanggal_lahir');
            $table->enum('jk', ['P', 'L']);
            $table->text('alamat');
            $table->string('slug', 255)->nullable();
            $table->enum('status_aktif', ['Y', 'N'])->default('Y');
            $table->string('password');
            $table->string('foto_user', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};