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
        Schema::create('kamars', function (Blueprint $table) {
            $table->id();
              $table->string('no_kmr')->unique();
               $table->string('tipe_kmr');
                $table->date('tgl_checkin');
                 $table->date('tgl_checkout');
                   $table->string('jmlh_kmr');
                     $table->string('jumlh_org');
                       $table->integer('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamars');
    }
};
