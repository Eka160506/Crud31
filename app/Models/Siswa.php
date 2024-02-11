<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    // Menggunakan trait HasFactory untuk menyediakan pembuatan factory
    use HasFactory;

    // Metode untuk menentukan hubungan "belongs to" antara siswa dan agama
    public function agama()
    {
        return $this->belongsTo(Agama::class);
    }

    // Atribut yang diizinkan untuk diisi secara massal
    protected $fillable = [
        'nama',
        'nomor_induk',
        'agama_id',
        'alamat',
    ];
}
