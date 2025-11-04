<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tahapan', function (Blueprint $table) {
            $table->id('id_tahapan');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('judul_tahap', 100);
            $table->text('deskripsi');
            $table->string('ikon', 100)->nullable();
            $table->integer('urutan')->default(0);
            $table->timestamp('tanggal_input')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tahapan');
    }
};
