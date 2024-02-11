@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Merekam merekam link ke dashboard, daftar pengguna, dan pembuatan pengguna -->
            <a class="navbar-brand" href="#">Petugas Dashboard</a>
            <!-- Tombol hamburger untuk menampilkan menu di perangkat kecil -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Daftar navigasi -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Tautan ke halaman utama -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('petugas.dashboard') }}">Home</a>
                    </li>
                    <!-- Tautan ke halaman daftar pengguna -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('petugas.view') }}">View User</a>
                    </li>
                    <!-- Tautan ke halaman pembuatan pengguna -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('petugas.create') }}">Create User</a>
                    </li>
                    <!-- Anda dapat menambahkan menu lainnya di sini sesuai kebutuhan -->
                </ul>
            </div>
        </div>
    </nav>

    <!-- Notifikasi -->
    <!-- Notifikasi sambutan kepada petugas -->
    <div class="alert alert-info mt-3" role="alert">
        Hello, Petugas! Ayo Kerja Kerja Kerja!!!.
    </div>

    <!-- Konten tambahan -->
    <!-- Tempat untuk menambahkan konten tambahan yang diperlukan -->
</div>
@endsection
