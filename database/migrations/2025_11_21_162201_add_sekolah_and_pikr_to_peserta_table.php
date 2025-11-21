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
        Schema::table('peserta', function (Blueprint $table) {
            // Menambahkan kolom asal_sekolah (Wajib diisi)
            // Saya taruh after('email') agar urutannya rapi di database
            $table->string('asal_sekolah', 100)->after('email'); 
            
            // Menambahkan kolom asal_pikr (Opsional / Boleh kosong)
            // Gunakan ->nullable() agar bersifat opsional
            $table->string('asal_pikr', 100)->nullable()->after('asal_sekolah'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peserta', function (Blueprint $table) {
            // Menghapus kolom jika di-rollback
            $table->dropColumn(['asal_sekolah', 'asal_pikr']);
        });
    }
};