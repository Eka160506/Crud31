<?php
namespace App\Models;

// Menggunakan trait untuk model memiliki fasilitas otentikasi
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    // Menggunakan trait untuk token API, pembuatan data dummy, dan notifikasi
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     * Atribut yang dapat diisi secara massal.
     */
    protected $fillable = [
        'role',
        'name',
        'email',
        'password',
        'gambar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     * Atribut yang tidak akan ditampilkan saat diserialisasi.
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     * Atribut yang akan di-cast ke jenis data tertentu.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Metode untuk memeriksa apakah pengguna adalah user
    public function isUser()
    {
        return $this->role === 'user';
    }

    // Metode untuk memeriksa apakah pengguna adalah admin
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    // Metode untuk memeriksa apakah pengguna adalah petugas
    public function isPetugas()
    {
        return $this->role === 'petugas';
    }

    // Menambahkan atribut 'profile_photo_url' ke model
    protected $appends = [
        'profile_photo_url',
    ];
}
