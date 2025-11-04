<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lomba;
use Illuminate\Support\Facades\Auth;

class LombaController extends Controller
{
    public function index()
    {
        $lombas = Lomba::latest()->get();
        return view('admin.lomba.index', compact('lombas'));
    }

    public function create()
    {
        return view('admin.lomba.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lomba' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'status' => 'required|in:dibuka,ditutup',
        ]);

        Lomba::create([
            'nama_lomba' => $request->nama_lomba,
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'status' => $request->status,
        ]);

        return redirect()->route('lomba.index')->with('success', 'Lomba berhasil ditambahkan.');
    }

    public function edit(Lomba $lomba)
    {
        return view('admin.lomba.edit', compact('lomba'));
    }

    public function update(Request $request, Lomba $lomba)
    {
        $request->validate([
            'nama_lomba' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'status' => 'required|string',
        ]);

        $lomba->update($request->all());

        return redirect()->route('lomba.index')->with('success', 'Data lomba berhasil diperbarui.');
    }

    public function destroy(Lomba $lomba)
    {
        $lomba->delete();
        return redirect()->route('lomba.index')->with('success', 'Data lomba berhasil dihapus.');
    }
}
