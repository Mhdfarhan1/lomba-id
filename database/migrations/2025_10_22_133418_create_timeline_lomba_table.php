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
        Schema::create('timeline_lomba', function (Blueprint $table) {
            $table->increments('id_timeline');
            
            $table->unsignedInteger('id_lomba'); // Foreign key
            $table->foreign('id_lomba')->references('id_lomba')->on('lomba')->onDelete('cascade');
            
            $table->dateTime('tanggal_mulai');
            $table->dateTime('tanggal_selesai');
            $table->string('keterangan', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timeline_lomba');
    }
};