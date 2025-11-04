<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendaftaranLomba;
use App\Models\Lomba;
use Illuminate\Support\Facades\DB;

class PublicStatistikController extends Controller
{
    public function index()
    {
        // Total lomba
        $totalLomba = Lomba::count();

        // Ambil semua pendaftaran beserta relasi peserta & lomba
        $pendaftaran = PendaftaranLomba::with(['peserta.kelas', 'lomba'])->get();

        // Total tim
        $totalTim = $pendaftaran->count();

        // Proposal diterima / tim terverifikasi
        $proposalApproved = $pendaftaran->where('status', 'diterima')->count();
        $timTerverifikasi = $proposalApproved;

        // Tim terverifikasi per lomba + nama kelas
        $timTerverifikasiPerLomba = $pendaftaran
            ->where('status', 'diterima')
            ->groupBy('id_lomba')
            ->map(function ($items) {
                return [
                    'nama_lomba' => $items->first()->lomba->nama_lomba ?? '-',
                    'total_tim' => $items->count(),
                    'kelas' => $items->map(fn($i) => $i->peserta->kelas->nama_kelas ?? '-')->unique()->values()->all()
                ];
            })->values();

        // Institusi aktif
        $institusiAktif = DB::table('kelas')
            ->join('peserta', 'kelas.id_kelas', '=', 'peserta.id_kelas')
            ->distinct('kelas.id_kelas')
            ->count('kelas.id_kelas');

        // Top 5 institusi
        $topInstitusi = DB::table('kelas')
            ->join('peserta', 'kelas.id_kelas', '=', 'peserta.id_kelas')
            ->select('kelas.nama_kelas as nama_institusi', DB::raw('count(peserta.id_peserta) as jumlah'))
            ->groupBy('kelas.id_kelas', 'kelas.nama_kelas')
            ->orderBy('jumlah', 'desc')
            ->limit(5)
            ->get();

        // Peserta per lomba (LEFT JOIN agar semua lomba muncul)
        $pesertaPerLomba = DB::table('lomba')
            ->leftJoin('pendaftaran_lomba', 'lomba.id_lomba', '=', 'pendaftaran_lomba.id_lomba')
            ->select('lomba.nama_lomba', DB::raw('COUNT(pendaftaran_lomba.id_lomba) as total_peserta'))
            ->groupBy('lomba.id_lomba', 'lomba.nama_lomba')
            ->get();

        // Status proposal
        $statusProposal = $pendaftaran
            ->groupBy('status')
            ->mapWithKeys(fn($items, $key) => [$key => $items->count()]);

        return view('public.statistik', compact(
            'totalTim',
            'totalLomba',
            'proposalApproved',
            'timTerverifikasi',
            'timTerverifikasiPerLomba', // <<< sudah ada nama kelas
            'institusiAktif',
            'statusProposal',
            'topInstitusi',
            'pesertaPerLomba',
            'pendaftaran'
        ));
    }
}
