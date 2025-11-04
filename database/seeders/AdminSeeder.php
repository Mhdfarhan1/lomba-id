<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admin')->insert([
            'username' => 'adminlomba',             // username admin default
            'password' => Hash::make('123456'), // password terenkripsi
            'nama_admin' => 'Administrator',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $this->command->info('Admin default berhasil dibuat.');
    }
}
