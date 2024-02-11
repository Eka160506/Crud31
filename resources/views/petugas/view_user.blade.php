@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Merekam merekam link ke dashboard, daftar pengguna, dan pembuatan pengguna -->
            <a class="navbar-brand" href="#">Petugas View as Role</a>
            <!-- Tombol hamburger untuk menampilkan menu di perangkat kecil -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Daftar navigasi -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Tautan ke halaman utama -->
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{ route('petugas.dashboard') }}">Home</a>
                    </li>
                    <!-- Tautan ke halaman daftar pengguna -->
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('petugas.view') }}">View User</a>
                    </li>
                    <!-- Tautan ke halaman pembuatan pengguna -->
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('petugas.create') }}">Create User</a>
                    </li>
                    <!-- Anda dapat menambahkan menu lainnya di sini sesuai kebutuhan -->
                </ul>
            </div>
        </div>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User List by Role</div>

                <div class="card-body">
                    @foreach($usersByRole as $role => $users)
                    <h3>{{ ucfirst($role) }}s</h3>
                    <ul>
                        @foreach($users as $user)
                        <li>{{ $user->name }} - {{ $user->email }}</li>
                        @endforeach
                    </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
