<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeKamar extends Model
{
    use HasFactory;

    protected $table = 'tipe_kamars'; // sesuai dengan nama tabel kamu di database

    protected $fillable = [
        'nama_tipe',
        'deskripsi',
        'harga'
    ];

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class, 'tipe_kmr');
    }
}
