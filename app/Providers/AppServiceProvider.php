<?php

namespace App\Providers;

use App\Models\Pengajuan; // <-- Import Model
use App\Observers\PengajuanObserver; // <-- Import Observer
use Illuminate\Support\ServiceProvider;

// Hapus 'use Illuminate\Support\Facades\Event;' karena tidak lagi digunakan

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
    public function boot(): void
    {
        // ==> CARA YANG BENAR UNTUK MENDAFTARKAN OBSERVER <==
        // Panggil metode observe() langsung pada model yang bersangkutan.
        Pengajuan::observe(PengajuanObserver::class);
    }
}
