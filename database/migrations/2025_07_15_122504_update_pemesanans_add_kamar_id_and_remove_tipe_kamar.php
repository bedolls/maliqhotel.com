<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            // Hapus tipe_kamar
            $table->dropColumn('tipe_kamar');

            // Tambahkan kamar_id sebagai foreign key
            $table->unsignedBigInteger('kamar_id')->after('nama_pelanggan');
            $table->foreign('kamar_id')->references('id')->on('kamars')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            $table->string('tipe_kamar');
            $table->dropForeign(['kamar_id']);
            $table->dropColumn('kamar_id');
        });
    }
};


