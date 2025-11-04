<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TahapanController;
use App\Http\Controllers\PublicStatistikController;
use App\Http\Controllers\Admin\TimelineLombaController;
use App\Http\Controllers\AdminForgotPasswordController;

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Admin\PendaftaranLombaController;

// ---------------------------
// Landing Page
// ---------------------------
Route::get('/', [LandingPageController::class, 'index'])->name('landing');

// ---------------------------
// Statistik Publik
Route::get('/statistik', [PublicStatistikController::class, 'index'])->name('public.statistik');

// ---------------------------
// Halaman Pendaftaran
// ---------------------------
// Jika pendaftaran ditutup
Route::get('/pendaftaran-tutup', function () {
    return view('pendaftaran-tutup');
})->name('pendaftaran.tutup');

// Form pendaftaran
Route::get('/pendaftaran', [PendaftaranController::class, 'create'])->name('pendaftaran.create');
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

// ---------------------------
// Admin Auth & Dashboard
// ---------------------------
Route::prefix('admin')->group(function () {

    // Login / Logout
    Route::get('login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // ✅ Lupa Password Admin (berbasis username atau email)
    Route::get('forgot-password', [AdminForgotPasswordController::class, 'showForm'])->name('admin.password.request');
    Route::post('forgot-password', [AdminForgotPasswordController::class, 'sendLink'])->name('admin.password.email');
    Route::post('reset-password', [AdminForgotPasswordController::class, 'reset'])->name('admin.password.update');

    // Dashboard & Profil
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/notifications', [DashboardController::class, 'notifications']);

    Route::get('/profil', [AdminController::class, 'profil'])->name('admin.profil');
    Route::post('/admin/update-profile', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');

    // Pengaturan
    Route::get('setting', [SettingController::class, 'index'])->name('admin.setting.index');
    Route::put('setting', [SettingController::class, 'update'])->name('admin.setting.update');

    // Kelas & Lomba
    Route::resource('kelas', App\Http\Controllers\Admin\KelasController::class);
    Route::resource('lomba', App\Http\Controllers\Admin\LombaController::class);

    // ---------------------------
    // Pendaftaran Lomba (Admin)
    Route::post('pendaftaran/send-all-email', [PendaftaranLombaController::class, 'sendAllEmail'])
        ->name('pendaftaran.sendAllEmail');
    Route::post('pendaftaran/{id}/send-email', [PendaftaranLombaController::class, 'sendEmail'])
        ->name('pendaftaran.sendEmail');
    Route::post('pendaftaran/{id}/update-status', [PendaftaranLombaController::class, 'updateStatus'])
        ->name('pendaftaran.updateStatus');

    Route::resource('pendaftaran', PendaftaranLombaController::class);

    //Tahapan Lomba (Admin)
    Route::resource('tahapan', TahapanController::class);
});

// ---------------------------
// Timeline Lomba (Admin)
// ---------------------------
Route::resource('timeline', TimelineLombaController::class);
