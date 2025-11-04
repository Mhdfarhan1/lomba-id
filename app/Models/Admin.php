<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    // Menentukan nama tabel karena tidak jamak (bukan 'admins')
    protected $table = 'admin';

    // Menentukan primary key karena bukan 'id'
    protected $primaryKey = 'id_admin';

    // Kolom yang boleh diisi secara massal
    protected $fillable = [
        'username',
        'password',
        'nama_admin',
    ];

    // Kolom yang disembunyikan saat di-return
    protected $hidden = [
        'password',
    ];

    /**
     * Relasi: Satu Admin bisa membuat banyak Lomba.
     */
    public function lomba()
    {
        return $this->hasMany(Lomba::class, 'id_admin', 'id_admin');
    }
}
