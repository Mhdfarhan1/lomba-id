<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Lomba;
use App\Models\TimelineLomba;
use App\Models\Tahapan;
use Carbon\Carbon;

class LandingPageController extends Controller
{
    public function index()
    {
        // Ambil semua lomba yang dibuka
        $lombas = Lomba::where('status', 'dibuka')
            ->orderBy('tanggal_mulai', 'asc')
            ->get();

        // Ambil deadline utama dari setting
        $mainDeadline = Setting::where('key', 'main_deadline')->first()?->value;

        // Ambil waktu mulai upload karya dari setting
        $uploadMulai = Setting::where('key', 'upload_mulai')->first()?->value;

        // Ambil waktu selesai upload karya dari setting (opsional)
        $uploadSelesai = Setting::where('key', 'upload_selesai')->first()?->value;

        // Konversi ke timestamp JS (ms)
        $deadlineTimestamp = $mainDeadline ? Carbon::parse($mainDeadline)->timezone('Asia/Jakarta')->timestamp * 1000 : null;
        $uploadMulaiTimestamp = $uploadMulai ? Carbon::parse($uploadMulai)->timezone('Asia/Jakarta')->timestamp * 1000 : null;
        $uploadSelesaiTimestamp = $uploadSelesai ? Carbon::parse($uploadSelesai)->timezone('Asia/Jakarta')->timestamp * 1000 : null;

        // Cek apakah pendaftaran masih dibuka
        $isRegistrationOpen = false;
        if ($mainDeadline) {
            $deadline = Carbon::parse($mainDeadline)->timezone('Asia/Jakarta');
            if (Carbon::now()->timezone('Asia/Jakarta') < $deadline) {
                $isRegistrationOpen = true;
            }
        }

        // Ambil semua tahapan lomba
        $tahapan = Tahapan::orderBy('urutan', 'asc')->get();

        // Ambil timeline lomba
        $timelines = TimelineLomba::with('lomba')
            ->orderBy('tanggal_mulai', 'asc')
            ->get();

        // Kirim data ke view
        return view('lombapik-id', compact(
            'lombas',
            'mainDeadline',
            'deadlineTimestamp',
            'uploadMulai',
            'uploadMulaiTimestamp',
            'uploadSelesaiTimestamp',
            'isRegistrationOpen',
            'timelines',
            'tahapan'
        ));
    }

    // Halaman jika upload belum dibuka
    public function uploadBelumDibuka()
    {
        return view('upload_belum_dibuka'); // buat view baru
    }

    // Halaman jika upload sudah habis
    public function uploadHabis()
    {
        return view('upload_habis'); // buat view baru
    }
}
