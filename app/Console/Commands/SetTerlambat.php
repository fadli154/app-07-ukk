<?php

namespace App\Console\Commands;

use App\Models\Peminjaman;
use Illuminate\Console\Command;

class SetTerlambat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'peminjaman:set-terlambat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengubah status peminjaman menjadi terlamabat jika tanggal kembali fisik lebih besar dari tanggal kembali sebenarnya';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Mulai mengubah');

        $peminjamanList = Peminjaman::all();
        foreach ($peminjamanList as $peminjaman) {
            if (($peminjaman->status == 'dipinjam' || $peminjaman->status == 'dikembalikan') && $peminjaman->tanggal_kembali_fisik >= $peminjaman->tanggal_kembali) {
                $peminjaman->status = 'terlambat';
                $peminjaman->save();
            }
        }

        $this->info('Selesai mengubah');
    }
}
