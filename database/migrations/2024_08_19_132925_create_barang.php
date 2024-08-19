<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // nama_barang, kode, kategori, lokasi
        Schema::create('barang', function (Blueprint $table) {
            $table->id('id_barang');
            $table->string("nama_barang");
            $table->string("kode");
            $table->enum("kategori", ['0', '1']);
            $table->string("lokasi");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};