<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Penting untuk otentikasi
use Illuminate\Validation\ValidationException; // Untuk error validasi login

class LoginController extends Controller
{
    /**
     * Menampilkan form login.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Akan mengarah ke resources/views/auth/login.blade.php
    }

    /**
     * Menangani proses login user.
     * Login akan menggunakan email dan password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Coba untuk login
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate(); // Regenerasi session ID untuk keamanan

            return redirect()->intended('/dashboard')->with('success', 'Anda berhasil login!'); // Redirect ke dashboard atau halaman yang dituju sebelumnya
        }

        // Jika login gagal, lemparkan error validasi
        throw ValidationException::withMessages([
            'email' => __('auth.failed'), // Menggunakan pesan error default Laravel untuk otentikasi gagal
        ]);
    }

    /**
     * Menangani proses logout user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout(); // Logout user

        $request->session()->invalidate(); // Invalidasi session saat ini
        $request->session()->regenerateToken(); // Regenerasi token CSRF

        return redirect('/')->with('success', 'Anda telah logout.'); // Redirect ke halaman utama atau halaman login
    }
}
