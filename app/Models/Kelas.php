<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    // Menentukan nama tabel karena tidak jamak (bukan 'kelases')
    protected $table = 'kelas';

    // Menentukan primary key
    protected $primaryKey = 'id_kelas';

    // Kolom yang boleh diisi
    protected $fillable = [
        'nama_kelas',
    ];

    /**
     * Relasi: Satu Kelas memiliki banyak Peserta.
     */
    public function peserta()
    {
        return $this->hasMany(Peserta::class, 'id_kelas', 'id_kelas');
    }
}