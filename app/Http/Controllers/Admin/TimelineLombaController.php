<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TimelineLomba;
use App\Models\Lomba;

class TimelineLombaController extends Controller
{
    // Cek session admin
    private function checkAdminSession(Request $request)
    {
        if (!$request->session()->has('admin_id')) {
            return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu.');
        }
        return null;
    }

    // Tampilkan semua timeline
    public function index(Request $request)
    {
        if ($redirect = $this->checkAdminSession($request)) return $redirect;

        $timelines = TimelineLomba::with('lomba')->orderBy('tanggal_mulai', 'desc')->get();
        return view('admin.timeline.index', compact('timelines'));
    }

    // Form create timeline
    public function create(Request $request)
    {
        if ($redirect = $this->checkAdminSession($request)) return $redirect;

        $lombas = Lomba::all();
        return view('admin.timeline.create', compact('lombas'));
    }

    // Simpan timeline baru, tanggal diambil dari lomba
    public function store(Request $request)
    {
        if ($redirect = $this->checkAdminSession($request)) return $redirect;

        $request->validate([
            'id_lomba' => 'required|exists:lomba,id_lomba',
            'keterangan' => 'nullable|string'
        ]);

        // Ambil tanggal dari lomba
        $lomba = Lomba::findOrFail($request->id_lomba);

        TimelineLomba::create([
            'id_lomba' => $lomba->id_lomba,
            'tanggal_mulai' => $lomba->tanggal_mulai,
            'tanggal_selesai' => $lomba->tanggal_selesai,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('timeline.index')->with('success', 'Timeline berhasil ditambahkan.');
    }

    // Form edit timeline
    public function edit(Request $request, TimelineLomba $timeline)
    {
        if ($redirect = $this->checkAdminSession($request)) return $redirect;

        $lombas = Lomba::all();
        return view('admin.timeline.edit', compact('timeline', 'lombas'));
    }

    // Update timeline, tanggal tetap diambil dari lomba
    public function update(Request $request, TimelineLomba $timeline)
    {
        if ($redirect = $this->checkAdminSession($request)) return $redirect;

        $request->validate([
            'id_lomba' => 'required|exists:lomba,id_lomba',
            'keterangan' => 'nullable|string'
        ]);

        $lomba = Lomba::findOrFail($request->id_lomba);

        $timeline->update([
            'id_lomba' => $lomba->id_lomba,
            'tanggal_mulai' => $lomba->tanggal_mulai,
            'tanggal_selesai' => $lomba->tanggal_selesai,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('timeline.index')->with('success', 'Timeline berhasil diperbarui.');
    }

    // Hapus timeline
    public function destroy(Request $request, TimelineLomba $timeline)
    {
        if ($redirect = $this->checkAdminSession($request)) return $redirect;

        $timeline->delete();
        return redirect()->route('timeline.index')->with('success', 'Timeline berhasil dihapus.');
    }
}
