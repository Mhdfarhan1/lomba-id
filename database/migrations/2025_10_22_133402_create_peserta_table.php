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
        Schema::create('peserta', function (Blueprint $table) {
            $table->increments('id_peserta');
            $table->string('nama_peserta', 100);
            $table->string('nis', 30);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            
            $table->unsignedInteger('id_kelas'); // Foreign key
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->onDelete('cascade');
            
            $table->string('no_hp', 20);
            $table->string('email', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta');
    }
};