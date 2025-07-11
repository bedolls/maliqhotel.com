<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_pemesanan',
        'nama_pelanggan',
        'tipe_kamar',
        'total_harga',
        'foto',
    ];
}


