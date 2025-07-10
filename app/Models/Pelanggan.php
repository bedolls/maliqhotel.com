<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans';

    protected $fillable = [
        'nama',
        'alamat',
        'jenis_kelamin',
        'no_hp',
    ];

    // Tambahkan relasi ke tabel pemesanans
    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class, 'no_pelanggan');
    }
}

