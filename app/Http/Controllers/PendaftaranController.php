<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\Kelas;
use App\Models\Lomba;
use App\Models\PendaftaranLomba;

class PendaftaranController extends Controller
{
    // Tampilkan form pendaftaran
    public function create()
    {
        $kelases = Kelas::orderBy('nama_kelas')->get();
        $lombas  = Lomba::where('status', 'dibuka')->orderBy('nama_lomba')->get();

        return view('pendaftaran', compact('kelases', 'lombas'));
    }

    // Simpan data pendaftaran
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_peserta'     => 'required|string|max:100',
            'nis'              => 'required|string|max:30|unique:peserta,nis',
            'jenis_kelamin'    => 'required|in:Laki-laki,Perempuan',
            'id_kelas'         => 'required|integer|exists:kelas,id_kelas',
            'no_hp'            => 'required|string|max:20',
            'email'            => 'nullable|email|max:100',
            'id_lomba'         => 'required|integer|exists:lomba,id_lomba',
            'jenis_peserta'    => 'required|in:Individu,Kelompok',
            'anggota_kelompok' => 'nullable|string',
        ]);

        // Jika kelompok, pecah anggota berdasarkan koma dan trim spasi
        $anggota = $request->jenis_peserta === 'Kelompok' && $request->anggota_kelompok
                    ? array_map('trim', explode(',', $request->anggota_kelompok))
                    : null;

        // Simpan peserta dulu
        $peserta = Peserta::create([
            'nama_peserta'     => $request->nama_peserta,
            'nis'              => $request->nis,
            'jenis_kelamin'    => $request->jenis_kelamin,
            'id_kelas'         => $request->id_kelas,
            'no_hp'            => $request->no_hp,
            'email'            => $request->email,
            'jenis_peserta'    => $request->jenis_peserta,
            'anggota_kelompok' => $anggota ? json_encode($anggota) : null, // simpan JSON
        ]);

        // Simpan pendaftaran lomba (tabel pivot)
        PendaftaranLomba::create([
            'id_peserta'       => $peserta->id_peserta,
            'id_lomba'         => $request->id_lomba,
            'tanggal_daftar'   => now(),
        ]);

        return redirect()->route('pendaftaran.create')
            ->with('success', 'Pendaftaran berhasil! Terima kasih telah mendaftar.');
    }
}
