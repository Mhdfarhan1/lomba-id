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
        // Ambil data deadline utama
        $mainDeadline = Setting::where('key', 'main_deadline')->first()?->value;

        // Ambil data upload karya
        $uploadMulai = Setting::where('key', 'upload_mulai')->first()?->value;

        return view('admin.setting.index', compact('mainDeadline', 'uploadMulai'));
    }

    // Update pengaturan timeline
    public function update(Request $request)
    {
        $request->validate([
            'main_deadline' => 'nullable|date',
            'upload_mulai' => 'nullable|date',
        ]);

        // Update deadline utama
        Setting::updateOrCreate(
            ['key' => 'main_deadline'],
            ['value' => $request->main_deadline]
        );

        // Update upload karya
        Setting::updateOrCreate(
            ['key' => 'upload_mulai'],
            ['value' => $request->upload_mulai]
        );

        return redirect()->route('admin.setting.index')
            ->with('success', 'Pengaturan timeline berhasil disimpan!');
    }
}
