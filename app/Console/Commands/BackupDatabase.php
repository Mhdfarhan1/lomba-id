<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;

class BackupDatabase extends Command
{
    /**
     * Nama perintah Artisan
     */
    protected $signature = 'db:backup';

    /**
     * Deskripsi perintah
     */
    protected $description = 'Backup database ke folder storage/backups';

    /**
     * Jalankan perintah
     */
    public function handle()
    {
        $database = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $host = env('DB_HOST', '127.0.0.1');
        $date = Carbon::now()->format('Y-m-d_H-i-s');

        $backupPath = storage_path("backups/{$database}_backup_{$date}.sql");

        // Pastikan folder backup ada
        if (!is_dir(storage_path('backups'))) {
            mkdir(storage_path('backups'), 0755, true);
        }

        // Buat perintah mysqldump
        $command = "mysqldump -h {$host} -u {$username} " . (!empty($password) ? "-p{$password} " : "") . "{$database} > \"{$backupPath}\"";

        $this->info('Membuat backup database...');

        $result = null;
        system($command, $result);

        if ($result === 0) {
            $this->info("✅ Backup berhasil: {$backupPath}");
        } else {
            $this->error('❌ Gagal membuat backup database. Pastikan mysqldump tersedia di sistem.');
        }
    }
}
