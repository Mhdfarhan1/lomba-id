<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PendaftaranLomba;
use Illuminate\Support\Facades\Mail;
use App\Mail\KonfirmasiPendaftaranMail;

class PendaftaranLombaController extends Controller
{
    // Menampilkan semua pendaftaran
    public function index()
    {
        $pendaftaran = PendaftaranLomba::with(['peserta.kelas', 'lomba'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.pendaftaran_lomba.index', compact('pendaftaran'));
    }

    // Menampilkan detail pendaftaran
    public function show($id)
    {
        $pendaftaran = PendaftaranLomba::with(['peserta.kelas', 'lomba'])->findOrFail($id);
        return view('admin.pendaftaran_lomba.show', compact('pendaftaran'));
    }

    // Hapus pendaftaran
    public function destroy($id)
    {
        $pendaftaran = PendaftaranLomba::findOrFail($id);
        $pendaftaran->delete();

        return redirect()->route('pendaftaran.index')
            ->with('success', 'Pendaftaran berhasil dihapus.');
    }

    // Kirim email ke 1 peserta
    public function sendEmail($id)
    {
        $pendaftaran = PendaftaranLomba::with(['peserta', 'lomba'])->findOrFail($id);

        if (!$pendaftaran->peserta->email) {
            return back()->with('error', 'Peserta belum memiliki email.');
        }

        // Pastikan jenis_peserta tersedia
        $pendaftaran->jenis_peserta = $pendaftaran->jenis_peserta ?? $pendaftaran->peserta->jenis_peserta;

        try {
            Mail::to($pendaftaran->peserta->email)->send(new KonfirmasiPendaftaranMail($pendaftaran));
            // Set status otomatis jadi diterima jika email berhasil dikirim
            $pendaftaran->status = 'diterima';
            $pendaftaran->save();

            return back()->with('success', 'Email konfirmasi berhasil dikirim ke ' . $pendaftaran->peserta->nama_peserta);
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengirim email: ' . $e->getMessage());
        }
    }

    // Kirim email ke semua peserta
    public function sendAllEmail()
    {
        $pendaftaranList = PendaftaranLomba::with(['peserta', 'lomba'])->get();
        $sentCount = 0;

        foreach ($pendaftaranList as $pendaftaran) {
            if ($pendaftaran->peserta->email) {
                $pendaftaran->jenis_peserta = $pendaftaran->jenis_peserta ?? $pendaftaran->peserta->jenis_peserta;
                try {
                    Mail::to($pendaftaran->peserta->email)->send(new KonfirmasiPendaftaranMail($pendaftaran));
                    $pendaftaran->status = 'diterima';
                    $pendaftaran->save();
                    $sentCount++;
                } catch (\Exception $e) {
                    // Lewatkan peserta yang gagal, bisa log error jika perlu
                    continue;
                }
            }
        }

        return back()->with('success', "Email konfirmasi berhasil dikirim ke $sentCount peserta.");
    }

    // Update status (via AJAX)
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:menunggu,diterima,ditolak',
        ]);

        $pendaftaran = PendaftaranLomba::findOrFail($id);
        $pendaftaran->status = $request->status;
        $pendaftaran->save();

        return response()->json(['success' => true]);
    }
}
