<!DOCTYPE html>
<html>
<head>
    <title>Daftar Siswa</title>
    <!-- Tautkan CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Atur gaya tambahan jika diperlukan */
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Judul halaman -->
        <h1 class="mt-4 mb-3">Detail Siswa</h1>
        <!-- Tabel untuk menampilkan detail siswa -->
        <table class="table table-bordered">
            <thead class="thead-dark">
                <!-- Baris header tabel -->
                <tr>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Detail</th>
                </tr>
            </thead>
            <tbody>
                <!-- Baris data untuk setiap atribut siswa -->
                <tr>
                    <th scope="row">Nama</th>
                    <!-- Menampilkan nama siswa -->
                    <td>{{ $siswa->nama }}</td>
                </tr>
                <tr>
                    <th scope="row">Nomor Induk Siswa</th>
                    <!-- Menampilkan nomor induk siswa -->
                    <td>{{ $siswa->nomor_induk }}</td>
                </tr>
                <tr>
                    <th scope="row">Agama</th>
                    <!-- Menampilkan agama siswa -->
                    <td>{{ $siswa->agama->nama }}</td>
                </tr>
                <tr>
                    <th scope="row">Alamat</th>
                    <!-- Menampilkan alamat siswa -->
                    <td>{{ $siswa->alamat }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
