<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamars';

    protected $fillable = [
        'tipe_kmr',
        'kapasitas',
        'harga',
    ];

    // HAPUS bagian casts jika tidak memakai enum lagi
    // protected $casts = [
    //     'tipe_kmr' => TipeKamar::class,
    // ];
}
