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
        'foto_kamar',
    ];
    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class, 'kamar_id');
    }
    

}
