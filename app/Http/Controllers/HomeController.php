<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // Periksa peran pengguna dan tampilkan beranda sesuai peran
        if ($request->user()->isAdmin()) {
            // Jika pengguna adalah admin, tampilkan halaman dashboard admin
            return view('admin.dashboard');
        } elseif ($request->user()->isPetugas()) {
            // Jika pengguna adalah petugas, tampilkan halaman dashboard petugas
            return view('petugas.dashboard');
        } else {
            // Jika pengguna adalah pengguna biasa, tampilkan halaman dashboard pengguna biasa
            return view('home');
        }
    }
}
