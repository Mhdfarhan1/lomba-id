<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lomba;
use App\Models\PendaftaranLomba;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Pastikan admin sudah login
        if (!$request->session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }

        $adminId = $request->session()->get('admin_id');

        // Ambil data admin dari tabel 'admin'
        $admin = DB::table('admin')->where('id_admin', $adminId)->first();

        $adminName = $admin->nama_admin ?? 'Admin';
        $adminUsername = $admin->username ?? 'admin';
        $adminCreatedAt = $admin->created_at ?? now();

        // Statistik singkat
        $stats = [
            [
                'title' => 'Total Lomba Terdaftar',
                'value' => Lomba::count(),
                'icon' => 'fas fa-trophy',
                'color_from' => '#4f46e5',
                'color_to' => '#3b82f6',
                'growth' => '+5%',
            ],
            [
                'title' => 'Total Kelas Terdaftar',
                'value' => DB::table('kelas')->count(),
                'icon' => 'fas fa-school',
                'color_from' => '#10b981',
                'color_to' => '#047857',
                'growth' => '+3%',
            ],
            [
                'title' => 'Tim/Pst Terdaftar',
                'value' => DB::table('pendaftaran_lomba')->count(),
                'icon' => 'fas fa-users',
                'color_from' => '#f59e0b',
                'color_to' => '#b45309',
                'growth' => '+8%',
            ],
            [
                'title' => 'Tim/Pst Terverifikasi',
                'value' => DB::table('pendaftaran_lomba')->where('status', 'diterima')->count(),
                'icon' => 'fas fa-check-circle',
                'color_from' => '#ec4899',
                'color_to' => '#9d174d',
                'growth' => '+2%',
            ],
        ];

        // Lomba terbaru (5 terakhir)
        $lombaTerbaru = Lomba::orderBy('tanggal_mulai', 'desc')->limit(5)->get();

        $pesertaTerverifikasi = DB::table('pendaftaran_lomba')
            ->join('peserta', 'pendaftaran_lomba.id_peserta', '=', 'peserta.id_peserta')
            ->where('pendaftaran_lomba.status', 'diterima')
            ->orderBy('pendaftaran_lomba.updated_at', 'desc')
            ->select('peserta.nama_peserta', 'pendaftaran_lomba.tanggal_daftar', 'pendaftaran_lomba.updated_at')
            ->get();

        // Data untuk chart peserta per lomba
        $pesertaPerLomba = DB::table('lomba')
            ->leftJoin('pendaftaran_lomba', 'lomba.id_lomba', '=', 'pendaftaran_lomba.id_lomba')
            ->select('lomba.nama_lomba', DB::raw('COUNT(pendaftaran_lomba.id_lomba) as total_peserta'))
            ->groupBy('lomba.id_lomba', 'lomba.nama_lomba')
            ->get();

        // Data Peserta Terverifikasi per Kelas
        $terverifikasiPerKelas = DB::table('pendaftaran_lomba')
            ->join('peserta', 'pendaftaran_lomba.id_peserta', '=', 'peserta.id_peserta')
            ->join('kelas', 'peserta.id_kelas', '=', 'kelas.id_kelas')
            ->where('pendaftaran_lomba.status', 'diterima')
            ->select('kelas.nama_kelas', DB::raw('COUNT(peserta.id_peserta) as total_peserta'))
            ->groupBy('kelas.id_kelas', 'kelas.nama_kelas')
            ->orderBy('total_peserta', 'desc')
            ->get();

        // Notifikasi peserta menunggu verifikasi
        $notifikasiCount = DB::table('pendaftaran_lomba')->where('status', 'menunggu')->count();
        $notifikasiData = DB::table('pendaftaran_lomba')
            ->join('peserta', 'pendaftaran_lomba.id_peserta', '=', 'peserta.id_peserta')
            ->where('pendaftaran_lomba.status', 'menunggu')
            ->orderBy('pendaftaran_lomba.created_at', 'desc')
            ->limit(5)
            ->select(
                'pendaftaran_lomba.id_pendaftaran',
                DB::raw("CONCAT('Peserta ', peserta.nama_peserta, ' menunggu verifikasi') as message"),
                'pendaftaran_lomba.created_at'
            )
            ->get();

        return view('admin.dashboard', compact(
            'admin',
            'adminName',
            'adminUsername',
            'adminCreatedAt',
            'stats',
            'lombaTerbaru',
            'pesertaTerverifikasi',
            'pesertaPerLomba',
            'terverifikasiPerKelas',
            'notifikasiCount',
            'notifikasiData'
        ));
    }


    /**
     * Method untuk ambil daftar notifikasi peserta menunggu verifikasi (AJAX)
     */
    public function notifications()
    {
        $notifications = DB::table('pendaftaran_lomba')
            ->join('peserta', 'pendaftaran_lomba.id_peserta', '=', 'peserta.id_peserta')
            ->where('pendaftaran_lomba.status', 'menunggu')
            ->orderBy('pendaftaran_lomba.created_at', 'desc')
            ->limit(5)
            ->select(
                'pendaftaran_lomba.id_pendaftaran',
                DB::raw("CONCAT('Peserta ', peserta.nama_peserta, ' menunggu verifikasi') as message"),
                'pendaftaran_lomba.created_at'
            )
            ->get();

        return response()->json($notifications);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('admin.login');
    }
}
