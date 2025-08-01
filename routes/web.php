<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompleteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// == HALAMAN UTAMA ==
// Mengarahkan pengguna ke halaman login jika belum terotentikasi,
// atau ke dashboard jika sudah login.
Route::get('/', function () {
    return Auth::check() ? redirect()->route('dashboard') : redirect()->route('login');
});


// == RUTE OTENTIKASI (UNTUK TAMU/GUEST) ==
// Rute ini hanya dapat diakses oleh pengguna yang belum login.
Route::middleware('guest')->group(function () {
    // Rute Registrasi
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    // Rute Login
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});


// == RUTE YANG MEMBUTUHKAN OTENTIKASI ==
// Semua rute di dalam grup ini hanya bisa diakses setelah pengguna login.
Route::middleware(['auth'])->group(function () {

    // Rute Umum (untuk semua role yang sudah login)
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Rute Berdasarkan Role Pengguna
    |--------------------------------------------------------------------------
    */

    // Rute HANYA untuk role 'pelindo_pakning'
    Route::middleware('role:pelindo_pakning')->group(function () {
        Route::resource('pengajuan', PengajuanController::class);
    });

    // Rute HANYA untuk role 'pelindo_dumai'
    Route::middleware('role:pelindo_dumai')->group(function () {
        Route::get('/permohonan', [PermohonanController::class, 'index'])->name('permohonan.index');
        Route::get('/permohonan/{permohonan}', [PermohonanController::class, 'show'])->name('permohonan.show');
        Route::patch('/permohonan/{permohonan}/status', [PermohonanController::class, 'updateStatus'])->name('permohonan.updateStatus');
    });

    Route::get('/complete', [CompleteController::class, 'index'])->name('complete.index');
});
