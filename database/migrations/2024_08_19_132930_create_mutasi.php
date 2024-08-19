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
        // tanggal, jenis_mutasi, jumlah
        Schema::create('mutasi', function (Blueprint $table) {
            $table->id('id_mutasi');
            $table->date("tanggal");
            $table->enum("jenis_mutasi", ['0', '1']);
            $table->integer("jumlah");
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_barang');
            $table->timestamps();
        });
        Schema::table('mutasi', function (Blueprint $table) {
            $table->foreign('id_user')->references('id_user')->on('user')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_barang')->references('id_barang')->on('barang')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mutasi');
    }
};
