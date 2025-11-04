<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tahapan;
use Illuminate\Http\Request;

class TahapanController extends Controller
{
    /**
     * Tampilkan daftar tahapan.
     */
    public function index()
    {
        $tahapans = Tahapan::orderBy('urutan', 'asc')->paginate(10);
        return view('admin.tahapan.index', compact('tahapans'));
    }

    /**
     * Tampilkan form tambah tahapan baru.
     */
    public function create()
    {
        return view('admin.tahapan.create');
    }

    /**
     * Simpan data tahapan baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'judul_tahap'     => 'required|string|max:100',
            'deskripsi'       => 'required|string',
            'ikon'            => 'nullable|string|max:100',
            'urutan'          => 'nullable|integer',
        ]);

        Tahapan::create([
            'tanggal_mulai'   => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'judul_tahap'     => $request->judul_tahap,
            'deskripsi'       => $request->deskripsi,
            'ikon'            => $request->ikon,
            'urutan'          => $request->urutan ?? 0,
        ]);

        return redirect()->route('tahapan.index')
            ->with('success', 'Tahapan berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit data tahapan.
     */
    public function edit(Tahapan $tahapan)
    {
        return view('admin.tahapan.edit', compact('tahapan'));
    }

    public function update(Request $request, Tahapan $tahapan)
    {
        $request->validate([
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'judul_tahap'     => 'required|string|max:100',
            'deskripsi'       => 'required|string',
            'ikon'            => 'nullable|string|max:100',
            'urutan'          => 'nullable|integer',
        ]);

        $tahapan->update([
            'tanggal_mulai'   => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'judul_tahap'     => $request->judul_tahap,
            'deskripsi'       => $request->deskripsi,
            'ikon'            => $request->ikon,
            'urutan'          => $request->urutan ?? 0,
        ]);

        return redirect()->route('tahapan.index')
            ->with('success', 'Tahapan berhasil diperbarui!');
    }


    /**
     * Hapus data tahapan.
     */
    public function destroy($id)
    {
        $tahapan = Tahapan::findOrFail($id);
        $tahapan->delete();

        return redirect()->route('tahapan.index')
            ->with('success', 'Tahapan berhasil dihapus!');
    }
}
