<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    // Menggunakan trait HasFactory untuk menyediakan pembuatan factory
    use HasFactory;

    // Metode untuk menentukan hubungan "has many" antara agama dan siswa
    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
