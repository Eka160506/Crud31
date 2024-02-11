<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Membuat tabel 'users'
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Menambahkan kolom 'id' sebagai primary key yang otomatis bertambah nilainya
            $table->enum('role', ['user', 'petugas', 'admin'])->default('user'); // Menambahkan kolom 'role' yang hanya bisa diisi dengan nilai 'user', 'petugas', atau 'admin', dengan nilai default 'user'
            $table->string('name'); // Menambahkan kolom 'name' dengan tipe data string
            $table->string('email')->unique(); // Menambahkan kolom 'email' dengan tipe data string yang unik (tidak boleh ada duplikat)
            $table->boolean('is_admin')->default(0); // Menambahkan kolom 'is_admin' dengan tipe data boolean dan nilai default 0
            $table->timestamp('email_verified_at')->nullable(); // Menambahkan kolom 'email_verified_at' dengan tipe data timestamp yang bisa bernilai NULL
            $table->string('password'); // Menambahkan kolom 'password' dengan tipe data string
            $table->rememberToken(); // Menambahkan kolom 'remember_token' yang digunakan untuk autentikasi pengguna
            $table->timestamps(); // Menambahkan dua kolom, 'created_at' dan 'updated_at', yang secara otomatis diatur nilai waktu saat pembuatan dan pembaruan data
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Menghapus kolom 'role' dari tabel 'users' jika migrasi di-rollback
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};

?>
