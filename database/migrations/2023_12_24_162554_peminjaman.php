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
        Schema::create('peminjaman', function(Blueprint $table){
            $table->id('id_peminjaman');
            $table->bigInteger('buku_id')->unsigned();
            $table->bigInteger('pelanggan_id')->unsigned();
            $table->foreign('pelanggan_id')->references('id_pelanggan')->on('pelanggan');
            $table->foreign('buku_id')->references('id_buku')->on('buku'); 
            $table->string('nama_pelanggan',255)->nullable();
            $table->string('note',255)->nullable();
            $table->string('judul_buku',255)->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');    }
};
