<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $admin = DB::table('admin')->where('username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            // Simpan data ke session
            $request->session()->put('admin_id', $admin->id_admin);
            $request->session()->put('admin_name', $admin->nama_admin);

            // Tambahkan flash message untuk SweetAlert
            return redirect()->route('dashboard')->with('success', 'Selamat datang, ' . $admin->nama_admin . '!');
        }

        return back()->withErrors(['login' => 'Username atau password salah']);
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['admin_id', 'admin_name']);
        return redirect()->route('admin.login')->with('success', 'Anda telah logout.');
    }
}
