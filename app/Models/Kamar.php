<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\TipeKamar; 

class Kamar extends Model
{
    protected $table = 'kamars';

    protected $fillable = [
        'tipe_kmr',
        'kapasitas',
        'harga',
    ];

    protected $casts = [
        'tipe_kmr' => TipeKamar::class,
    ];
}
