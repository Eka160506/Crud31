@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{ route('admin.dashboard') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('view') }}">View</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('create') }}">Create</a>
                    </li>
                    <!-- Tambahkan menu lainnya sesuai kebutuhan -->
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten tambahan -->
    <div class="panel-body">
        <form action="{{ route('tambah') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input name="gambar" type="file" class="form-control" id="gambar">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input name="nama" type="text" class="form-control" id="nama">
            </div>
            <div class="mb-3">
                <label for="nomor_induk" class="form-label">Nomor Induk Siswa</label>
                <input name="nomor_induk" type="text" class="form-control" id="nomor_induk">
            </div>
            <div class="mb-3">
                <label class="form-label">Agama</label>
                <select name="agama_id" class="form-control">
                    <option value="">Pilih agama</option>
                    @foreach ($agama as $item => $name)
                    <option value="{{ $item }}" @selected(old('agama_id')==$item)>
                        {{ $name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input name="alamat" type="text" class="form-control" id="alamat">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
