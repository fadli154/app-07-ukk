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

        $userList = User::with('peminjaman')->all();

        foreach ($userList as $user) {
            if ($user->peminjaman->where('status', 'terlambat')->count() > 0) {
                $user->status_aktif = 'N';
                $user->save();
            }
        }

        $this->info('Selesai mengubah');
    }
}
