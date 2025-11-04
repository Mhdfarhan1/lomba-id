<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahapan extends Model
{
    use HasFactory;

    protected $table = 'tahapan';
    protected $primaryKey = 'id_tahapan';
    public $timestamps = false; // karena kita pakai tanggal_input, bukan created_at/updated_at

    protected $fillable = [
        'tanggal_mulai',
        'tanggal_selesai',
        'judul_tahap',
        'deskripsi',
        'ikon',
        'urutan',
        'tanggal_input',
    ];
}
