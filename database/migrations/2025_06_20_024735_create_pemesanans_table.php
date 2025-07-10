<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->string('no_pemesanan')->unique();
            $table->string('nama_pelanggan')->nullable();
            $table->string('tipe_kamar');      // ⬅ Input manual juga
            $table->string('foto')->nullable();
            $table->integer('total_harga');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};

