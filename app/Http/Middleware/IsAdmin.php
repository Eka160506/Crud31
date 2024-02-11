<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     * Meng-handle permintaan yang masuk.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Memeriksa apakah pengguna sudah diautentikasi dan memiliki peran sebagai admin
        if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request); // Lanjutkan permintaan
        }

        // Jika pengguna tidak memiliki peran sebagai admin, redirect ke halaman login dengan pesan kesalahan
        return redirect('/login')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
    }
}
