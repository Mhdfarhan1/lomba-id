<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimelineLomba extends Model
{
    use HasFactory;

    // Menentukan nama tabel
    protected $table = 'timeline_lomba';

    // Menentukan primary key
    protected $primaryKey = 'id_timeline';

    // Kolom yang boleh diisi
    protected $fillable = [
        'id_lomba',
        'tanggal_mulai',
        'tanggal_selesai',
        'keterangan',
    ];

    /**
     * Relasi: Timeline ini milik satu Lomba.
     */
    public function lomba()
    {
        return $this->belongsTo(Lomba::class, 'id_lomba', 'id_lomba');
    }

    
}