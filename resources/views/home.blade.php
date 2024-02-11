@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                {{-- card-body --}}
                <div class="card-body">
                    @if(Auth::check()) {{-- Memeriksa apakah pengguna sudah diautentikasi --}}
                    @if(Auth::user()->isAdmin()) {{-- Memeriksa apakah pengguna memiliki peran sebagai admin --}}
                    {{-- Redirect admin ke halaman admin/dashboard --}}
                    <script>
                        window.location = "{{ route('admin.dashboard') }}";

                    </script>
                    @elseif(Auth::user()->isPetugas()) {{-- Memeriksa apakah pengguna memiliki peran sebagai petugas --}}
                    {{-- Redirect petugas ke halaman petugas/dashboard --}}
                    <script>
                        window.location = "{{ route('petugas.dashboard') }}";

                    </script>
                    @else
                    {{-- Tampilkan halaman home untuk pengguna biasa --}}
                    <p>Hello User, you have access to user features.</p>
                    <!-- Tambahkan konten spesifik untuk pengguna di sini -->
                    @endif
                    @else
                    <p>Please log in to access the dashboard.</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
