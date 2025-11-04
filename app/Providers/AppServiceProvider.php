<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        View::composer('admin.*', function ($view) {
            $adminId = session('admin_id');
            $admin = DB::table('admin')->where('id_admin', $adminId)->first();

            $adminName = $admin->nama_admin ?? 'Admin';
            $adminUsername = $admin->username ?? 'admin';
            $adminCreatedAt = $admin->created_at ?? now();

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

            $view->with(compact('adminName', 'adminUsername', 'adminCreatedAt', 'notifikasiCount', 'notifikasiData'));
        });
    }
}
