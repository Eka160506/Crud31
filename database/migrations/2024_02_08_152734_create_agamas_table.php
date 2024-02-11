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
        // Membuat tabel baru dengan nama 'agamas'
        Schema::create('agamas', function (Blueprint $table) {
            $table->id(); // Menambahkan kolom 'id' sebagai primary key yang otomatis bertambah nilainya
            $table->string('nama'); // Menambahkan kolom 'nama' dengan tipe data string
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
        // Menghapus tabel 'agamas' jika migrasi di-rollback
        Schema::dropIfExists('agamas');
    }
};

?>
