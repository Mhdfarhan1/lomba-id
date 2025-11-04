<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    // Tampilkan halaman form pengaturan timeline
    public function index()
    {
        // Ambil data deadline yang tersimpan
        $mainDeadline = Setting::where('key', 'main_deadline')->first()?->value;

        return view('admin.setting.index', compact('mainDeadline'));
    }



    // Update pengaturan timeline
    public function update(Request $request)
    {
        $request->validate([
            'main_deadline' => 'nullable|date',
        ]);

        // Update atau buat baru
        Setting::updateOrCreate(
            ['key' => 'main_deadline'],
            ['value' => $request->main_deadline]
        );

        return redirect()->route('admin.setting.index') // route dari resource
            ->with('success', 'Pengaturan timeline berhasil disimpan!');
    }
}
