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
        'kamar_id',
        'check_in',
        'check_out',
        'foto',
        'total_harga',
    ];

    // Relasi ke model Kamar
    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }
    // relasi ke model Pelanggan
    public function pelanggan()
{
    return $this->belongsTo(Pelanggan::class);
}

}
