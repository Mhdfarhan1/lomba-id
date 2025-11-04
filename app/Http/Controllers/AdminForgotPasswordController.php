<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminForgotPasswordController extends Controller
{
    /**
     * Tampilkan form "Lupa Password".
     */
    public function showForm()
    {
        return view('admin.auth.forgot-password');
    }

    /**
     * Cek username — jika ada, tampilkan form reset password.
     */
    public function sendLink(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
        ]);

        $admin = Admin::where('username', $request->username)->first();

        if (!$admin) {
            return back()->withErrors(['username' => '❌ Username tidak ditemukan.']);
        }

        // Langsung arahkan ke halaman reset password
        return view('admin.auth.reset-password', compact('admin'));
    }

    /**
     * Proses simpan password baru.
     */
    public function reset(Request $request)
    {
        $request->validate([
            'id_admin' => 'required|exists:admin,id_admin',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $admin = Admin::findOrFail($request->id_admin);
        $admin->password = Hash::make($request->password);
        $admin->save();

        return redirect()->route('admin.login')
            ->with('success', '✅ Password berhasil direset. Silakan login kembali.');
    }
}
