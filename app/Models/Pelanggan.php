<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    // Nama tabel di database (opsional kalau sesuai konvensi Laravel)
    protected $table = 'pelanggans';

    // Field yang boleh diisi (fillable)
    protected $fillable = [
        'nama',
        'alamat',
        'jenis_kelamin',
        'no_hp',
    ];
}
