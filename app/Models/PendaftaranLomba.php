<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PendaftaranLomba extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_lomba';
    protected $primaryKey = 'id_pendaftaran';

    protected $fillable = [
        'id_peserta',
        'id_lomba',
        'tanggal_daftar',
        'status',
        'jenis_peserta',
        'anggota_kelompok',
    ];

    // CAST anggota_kelompok ke array agar bisa diakses langsung
    protected $casts = [
        'anggota_kelompok' => 'array',
        'tanggal_daftar' => 'datetime', // otomatis jadi Carbon instance
    ];

    // Relasi ke peserta
    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'id_peserta', 'id_peserta');
    }

    // Relasi ke lomba
    public function lomba()
    {
        return $this->belongsTo(Lomba::class, 'id_lomba', 'id_lomba');
    }

    // Accessor untuk menampilkan status dengan label
    public function getStatusLabelAttribute()
    {
        return match ($this->status) {
            'menunggu' => '<span class="text-yellow-600 font-semibold">Menunggu</span>',
            'diterima' => '<span class="text-green-600 font-semibold">Diterima</span>',
            'ditolak' => '<span class="text-red-600 font-semibold">Ditolak</span>',
            default => '<span class="text-gray-500 font-semibold">-</span>',
        };
    }

    // Helper untuk cek status diterima
    public function isDiterima()
    {
        return $this->status === 'diterima';
    }

    // Helper untuk cek status ditolak
    public function isDitolak()
    {
        return $this->status === 'ditolak';
    }

    // Helper untuk cek status menunggu
    public function isMenunggu()
    {
        return $this->status === 'menunggu';
    }
}
