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
        // Membuat tabel baru dengan nama 'siswas'
        Schema::create('siswas', function (Blueprint $table) {
            $table->id(); // Menambahkan kolom 'id' sebagai primary key yang otomatis bertambah nilainya
            $table->string("nama"); // Menambahkan kolom 'nama' dengan tipe data string
            $table->string('nomor_induk'); // Menambahkan kolom 'nomor_induk' dengan tipe data string
            $table->bigInteger('agama_id')->unsigned(); // Menambahkan kolom 'agama_id' dengan tipe data big integer yang tidak boleh bernilai negatif (unsigned)
            $table->string("alamat"); // Menambahkan kolom 'alamat' dengan tipe data string
            $table->string("gambar")->nullable(); // Menambahkan kolom 'gambar' dengan tipe data string yang dapat bernilai null
            $table->timestamps(); // Menambahkan dua kolom, 'created_at' dan 'updated_at', yang secara otomatis diatur nilai waktu saat pembuatan dan pembaruan data
            // Menambahkan kunci asing (foreign key) pada kolom 'agama_id' yang merujuk ke kolom 'id' pada tabel 'agamas'. Jika entri di tabel 'agamas' dihapus, maka juga akan menghapus semua entri terkait dalam tabel 'siswas'
            $table->foreign('agama_id')->references('id')->on('agamas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Menghapus tabel 'siswas' jika migrasi di-rollback
        Schema::dropIfExists('siswas');
    }
};

?>
