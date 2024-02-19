<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        DB::unprepared('
            CREATE TRIGGER TR_peminjaman_AI
            AFTER INSERT
            ON peminjaman FOR EACH ROW
            BEGIN
                UPDATE buku SET stok_buku = buku.stok_buku - NEW.jumlah_pinjam
                WHERE buku.buku_id = NEW.buku_id;
            END;
        ');

        DB::unprepared('
            CREATE TRIGGER TR_peminjaman_AU
            AFTER UPDATE
            ON peminjaman FOR EACH ROW
            BEGIN
                UPDATE buku SET stok_buku = buku.stok_buku + OLD.jumlah_pinjam
                WHERE buku.buku_id = OLD.buku_id;
                UPDATE buku SET stok_buku = buku.stok_buku - NEW.jumlah_pinjam
                WHERE buku.buku_id = NEW.buku_id;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trigger_peminjaman_for_buku');
    }
};
