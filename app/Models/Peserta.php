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
        'jenis_peserta',     // baru
        'anggota_kelompok',  // baru
        'asal_sekolah',      // baru
        'asal_pikr',         // baru
    ];

    // CAST anggota_kelompok ke array
    protected $casts = [
        'anggota_kelompok' => 'array',
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
     * Relasi shortcut: Lomba yang diikuti peserta ini.
     */
    public function lomba()
    {
        // Relasi many-to-many melalui tabel 'pendaftaran_lomba'
        return $this->belongsToMany(
            Lomba::class,
            'pendaftaran_lomba', // tabel pivot
            'id_peserta',        // foreign key peserta
            'id_lomba'           // foreign key lomba
        );
    }
}
