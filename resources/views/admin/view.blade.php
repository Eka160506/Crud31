@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Brand dan tombol untuk toggling navbar pada perangkat kecil -->
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Daftar menu navbar -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Tautan untuk halaman utama -->
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{ route('admin.dashboard') }}">Home</a>
                    </li>
                    <!-- Tautan untuk melihat data -->
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('view') }}">View</a>
                    </li>
                    <!-- Tautan untuk membuat data baru -->
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('create') }}">Create</a>
                    </li>
                    <!-- Anda dapat menambahkan menu lainnya sesuai kebutuhan -->
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten tambahan -->
    <!-- Kartu untuk menampilkan data siswa -->
    <div class="card mt-5">
        <div class="card-body">
            <!-- Tabel untuk menampilkan data siswa -->
            <table class="table table-bordered table-striped">
                <thead>
                    <!-- Baris header tabel -->
                    <tr>
                        <th>No</th>
                        <th scope="row">Gambar</th>
                        <th>Nama</th>
                        <th>Nomor Induk Siswa</th>
                        <th>Agama</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Pengulangan untuk setiap data siswa -->
                    @php $no = 1; @endphp
                    @foreach ($siswa as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <!-- Kolom untuk menampilkan gambar siswa -->
                        <td><img src="{{ asset('gambar/' . $data->gambar) }}" alt="Gambar Siswa" style="max-width: 100px;"></td>
                        <!-- Kolom untuk menampilkan nama siswa -->
                        <td>{{ $data->nama }}</td>
                        <!-- Kolom untuk menampilkan nomor induk siswa -->
                        <td>{{ $data->nomor_induk }}</td>
                        <!-- Kolom untuk menampilkan agama siswa -->
                        <td>{{ $data->agama->nama }}</td>
                        <!-- Kolom untuk menampilkan alamat siswa -->
                        <td>{{ $data->alamat }}</td>
                        <!-- Kolom untuk menampilkan tombol aksi -->
                        <td>
                            <!-- Tombol untuk menghapus data siswa -->
                            <a href="{{ url('delete', [$data->id]) }}">
                                <button type="button" class="btn btn-danger">Delete</button>
                            </a>
                            <!-- Tombol untuk mengedit data siswa -->
                            <a href="{{ url('admin/edit', [$data->id]) }}">
                                <button type="button" class="btn btn-success">Edit</button>
                            </a>
                            <!-- Tombol untuk mencetak data siswa -->
                            <a href="{{ url('admin/print', [$data->id]) }}">
                                <button type="button" class="btn btn-warning">Print</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
