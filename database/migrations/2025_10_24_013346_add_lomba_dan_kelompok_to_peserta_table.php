<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('peserta', function (Blueprint $table) {
            // Tambah dua kolom baru saja
            $table->enum('jenis_peserta', ['Individu', 'Kelompok'])
                ->default('Individu')
                ->after('id_lomba');
                
            $table->text('anggota_kelompok')
                ->nullable()
                ->after('jenis_peserta');
        });
    }

    public function down(): void
    {
        Schema::table('peserta', function (Blueprint $table) {
            $table->dropColumn(['jenis_peserta', 'anggota_kelompok']);
        });
    }
};
