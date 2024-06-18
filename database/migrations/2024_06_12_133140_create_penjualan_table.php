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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->string('no_faktur')->primary();
            $table->date('tanggal_faktur');
            $table->string('nama_konsumen');
            $table->string('kode_barang')->nullable();
            $table->integer('jumlah');
            $table->bigInteger('harga_satuan');
            $table->bigInteger('harga_total');
            $table->timestamps();

            $table->foreign('kode_barang')->references('kode_barang')->on('barang')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};
