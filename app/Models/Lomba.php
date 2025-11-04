<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'lomba';

    // Primary key
    protected $primaryKey = 'id_lomba';

    // Kolom yang bisa diisi
    protected $fillable = [
        'nama_lomba',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
    ];

    /**
     * Relasi: Satu Lomba punya banyak Timeline.
     */
    public function timeline()
    {
        return $this->hasMany(TimelineLomba::class, 'id_lomba', 'id_lomba');
    }

    /**
     * Relasi: Satu Lomba punya banyak pendaftaran.
     */
    public function pendaftaran()
    {
        return $this->hasMany(PendaftaranLomba::class, 'id_lomba', 'id_lomba');
    }

    /**
     * Relasi (Shortcut): Peserta yang mendaftar di lomba ini.
     */
    public function peserta()
    {
        // Relasi 'many-to-many' melalui tabel 'pendaftaran_lomba'
        return $this->belongsToMany(
            Peserta::class,
            'pendaftaran_lomba', // tabel pivot
            'id_lomba',          // FK ke Lomba
            'id_peserta'         // FK ke Peserta
        );
    }
}
