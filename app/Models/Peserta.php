<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'peserta';

    // Primary key
    protected $primaryKey = 'id_peserta';

    // Kolom yang boleh diisi
    protected $fillable = [
        'nama_peserta',
        'nis',
        'jenis_kelamin',
        'id_kelas',
        'no_hp',
        'email',
        'jenis_peserta',      // kolom baru
        'anggota_kelompok',   // kolom baru
    ];

    /**
     * Relasi: Peserta ini milik satu Kelas.
     */
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }

    /**
     * Relasi: Satu Peserta bisa punya banyak pendaftaran.
     */
    public function pendaftaran()
    {
        return $this->hasMany(PendaftaranLomba::class, 'id_peserta', 'id_peserta');
    }

    /**
     * Relasi (Shortcut): Lomba yang diikuti oleh peserta ini.
     */
    public function lomba()
    {
        // Relasi 'many-to-many' melalui tabel 'pendaftaran_lomba'
        return $this->belongsToMany(
            Lomba::class,
            'pendaftaran_lomba', // Nama tabel perantara
            'id_peserta',        // Foreign key di tabel perantara untuk Peserta
            'id_lomba'           // Foreign key di tabel perantara untuk Lomba
        );
    }
}
