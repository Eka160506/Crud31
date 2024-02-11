<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsPetugas
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
        // Memeriksa apakah pengguna sudah diautentikasi dan memiliki peran sebagai petugas
        if (Auth::check() && Auth::user()->isPetugas()) {
            return $next($request); // Lanjutkan permintaan
        }

        // Jika pengguna tidak memiliki peran sebagai petugas, redirect ke halaman login dengan pesan kesalahan
        return redirect('/login')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
    }
}
