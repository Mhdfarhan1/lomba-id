<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function profil(Request $request)
    {
        if (!$request->session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }

        $adminId = $request->session()->get('admin_id');

        // Ambil data admin dari tabel admin
        $admin = DB::table('admin')->where('id_admin', $adminId)->first();

        $adminName = $admin->nama_admin ?? 'Admin';
        $adminUsername = $admin->username ?? '';
        $adminCreatedAt = $admin->created_at ?? now();

        // Notifikasi
        $notifikasiCount = DB::table('pendaftaran_lomba')
            ->where('status', 'menunggu')
            ->count();

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

        return view('admin.profil', compact(
            'adminName',
            'adminUsername',
            'adminCreatedAt',
            'notifikasiCount',
            'notifikasiData'
        ));
    }


    public function updateProfile(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:50',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $adminId = $request->session()->get('admin_id');

        $updateData = ['username' => $request->username];

        if ($request->password) {
            $updateData['password'] = bcrypt($request->password);
        }

        DB::table('admin')->where('id_admin', $adminId)->update($updateData);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
}
