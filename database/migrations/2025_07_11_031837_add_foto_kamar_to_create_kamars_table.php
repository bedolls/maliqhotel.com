<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('kamars', function (Blueprint $table) {
            $table->string('foto_kamar')->nullable()->after('harga'); // Menambahkan kolom setelah 'harga'
        });
    }

    public function down(): void
    {
        Schema::table('kamars', function (Blueprint $table) {
            $table->dropColumn('foto_kamar');
        });
    }
};
