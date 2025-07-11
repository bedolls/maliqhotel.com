<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kamars', function (Blueprint $table) {
            $table->id();

            // ENUM untuk tipe kamar
            $table->enum('tipe_kmr', [
                'standar',
                'deluxe',
                'deluxe view',
                'superior',
                'suite',
                'excecutive',
                'family_one',
                'family_two',
                'vip'
            ]);

            $table->integer('kapasitas');

            $table->integer('harga');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kamars');
    }
};

