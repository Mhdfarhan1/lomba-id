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
        Schema::create('pendaftaran_lomba', function (Blueprint $table) {
            $table->increments('id_pendaftaran');
            
            $table->unsignedInteger('id_peserta'); // Foreign key
            $table->foreign('id_peserta')->references('id_peserta')->on('peserta')->onDelete('cascade');
            
            $table->unsignedInteger('id_lomba'); // Foreign key
            $table->foreign('id_lomba')->references('id_lomba')->on('lomba')->onDelete('cascade');
            
            $table->dateTime('tanggal_daftar');
            $table->enum('status', ['menunggu', 'diterima', 'ditolak']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_lomba');
    }
};