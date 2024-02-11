@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Merekam merekam link ke dashboard, daftar pengguna, dan pembuatan pengguna -->
            <a class="navbar-brand" href="#">Petugas Create User</a>
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
                        <a class="nav-link" href="{{ route('petugas.view') }}">View User</a>
                    </li>
                    <!-- Tautan ke halaman pembuatan pengguna -->
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('petugas.create') }}">Create User</a>
                    </li>
                    <!-- Anda dapat menambahkan menu lainnya di sini sesuai kebutuhan -->
                </ul>
            </div>
        </div>
    </nav>


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a User, Security, or Admin for Login</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('petugas.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                            <div class="col-md-6">
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>

                            <div class="col-md-6">
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                            <div class="col-md-6">
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">Roles</label>
                            <div class="col-md-6">
                                <select name="role" id="role" class="form-control" required>
                                    <option value="user">User</option>
                                    <option value="petugas">Petugas</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
