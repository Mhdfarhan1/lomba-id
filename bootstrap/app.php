<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Console\Scheduling\Schedule;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )

    // ✅ Tambahkan perintah custom command
    ->withCommands([
        App\Console\Commands\BackupDatabase::class,
    ])

    // ✅ Tambahkan jadwal otomatis backup (misal tiap jam 23:00)
    ->withSchedule(function (Schedule $schedule) {
        $schedule->command('db:backup')->dailyAt('23:00');
    })

    ->withMiddleware(function (Middleware $middleware): void {
        // --- Middleware Global ---
    })

    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->create();
