<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class SetNonActiveUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:set-non-active-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengubah status aktif user menjadi non aktif jika terlambat mengembalikan buku';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Mulai mengubah');

        $selectUserLate = User::whereHas('peminjaman', function ($query) {
            $query->where('status', 'terlambat');
        })->get();

        foreach ($selectUserLate as $user) {
            $user->status = 'N';
            $user->save();
        }

        $this->info('Selesai mengubah');
    }
}