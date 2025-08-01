<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PengajuanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini Anda dapat mendaftarkan rute web untuk aplikasi Anda.
| Rute-rute ini dimuat oleh RouteServiceProvider dan semuanya akan
| ditugaskan ke grup middleware "web".
|
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

    // Rute Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Rute Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Rute Aplikasi Utama
    |--------------------------------------------------------------------------
    */

    // Rute untuk CRUD "Buat Pengajuan"
    // Hanya bisa diakses oleh pengguna dengan role 'pelindo_pakning'.
    Route::resource('pengajuan', PengajuanController::class)
        ->middleware('role:pelindo_pakning');

    // Anda bisa menambahkan rute lain yang memerlukan login di sini.
    // Contoh:
    // Route::resource('permohonan', PermohonanController::class)
    //      ->middleware('role:pelindo_dumai');

});
