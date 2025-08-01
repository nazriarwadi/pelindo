<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role  // Parameter ini akan menerima role dari rute (misal: 'pelindo_pakning')
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // 1. Cek apakah pengguna sudah login DAN memiliki role yang sesuai.
        //    Auth::user()->role akan mengambil role dari user yang sedang login.
        if (!Auth::check() || Auth::user()->role !== $role) {
            // 2. Jika tidak sesuai, hentikan request dan tampilkan halaman error 403 (Forbidden).
            //    Ini lebih baik daripada redirect, karena memberi tahu bahwa mereka tidak punya izin.
            abort(403, 'ANDA TIDAK MEMILIKI AKSES KE HALAMAN INI.');
        }

        // 3. Jika role sesuai, lanjutkan request ke controller.
        return $next($request);
    }
}
