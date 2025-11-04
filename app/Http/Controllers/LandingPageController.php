<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Lomba;
use App\Models\TimelineLomba;
use App\Models\Tahapan; // ✅ tambahkan model Tahapan
use Carbon\Carbon;

class LandingPageController extends Controller
{
    public function index()
    {
        // Ambil semua lomba yang dibuka
        $lombas = Lomba::where('status', 'dibuka')
            ->orderBy('tanggal_mulai', 'asc')
            ->get();

        // Ambil deadline dari database
        $mainDeadline = Setting::where('key', 'main_deadline')->first()?->value;

        // Konversi ke timestamp milidetik untuk JS
        $deadlineTimestamp = $mainDeadline
            ? Carbon::parse($mainDeadline)->timezone('Asia/Jakarta')->timestamp * 1000
            : null;

        // Cek apakah pendaftaran masih dibuka
        $isRegistrationOpen = false;
        if ($mainDeadline) {
            $deadline = Carbon::parse($mainDeadline)->timezone('Asia/Jakarta');
            if (Carbon::now()->timezone('Asia/Jakarta') < $deadline) {
                $isRegistrationOpen = true;
            }
        }

        // ✅ Ambil semua tahapan lomba (dari tabel tahapan)
        $tahapan = Tahapan::orderBy('urutan', 'asc')->get();

        // ✅ Ambil timeline lomba jika masih diperlukan
        $timelines = TimelineLomba::with('lomba')
            ->orderBy('tanggal_mulai', 'asc')
            ->get();

        // Kirim semua data ke view
        return view('lombapik-id', compact(
            'lombas',
            'mainDeadline',
            'deadlineTimestamp',
            'isRegistrationOpen',
            'timelines',
            'tahapan' // ✅ penting
        ));
    }
}
