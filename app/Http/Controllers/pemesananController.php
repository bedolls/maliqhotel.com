<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class pemesananController extends Controller
{
    // Menampilkan semua data pemesanan
    public function index()
    {
        $pemesanan = pemesanan::all(); // Tanpa relasi
        return view('layouts.Pemesanan.index', compact('pemesanan'));
    }

    // Form tambah
    public function create()
    {
        return view('layouts.Pemesanan.form'); // Tidak perlu kirim data lain
    }

    // Simpan data baru
    public function store(Request $request)
{
    $request->validate([
        'no_pemesanan'    => 'required|unique:pemesanans,no_pemesanan',
        'nama_pelanggan'  => 'required|string|max:255',
        'check_in'        => 'required|date',
        'check_out'       => 'required|date|after_or_equal:check_in',
        'tipe_kamar'      => 'required|string|max:255',
        'total_harga'     => 'required|numeric',
        'foto'            => 'nullable|image|max:2048',
    ]);

    $data = $request->only(['no_pemesanan', 'nama_pelanggan','check_in','check_out', 'tipe_kamar', 'total_harga']);

    if ($request->hasFile('foto')) {
        $data['foto'] = $request->file('foto')->store('pemesanan_foto', 'public');
    }

    Pemesanan::create($data);

    return redirect()->route('pemesanan.index')->with('success', 'Data pemesanan berhasil ditambahkan.');
}

public function update(Request $request, $id)
{
    $pemesanan = Pemesanan::findOrFail($id);

    $request->validate([
        'no_pemesanan'    => 'required|unique:pemesanans,no_pemesanan,' . $pemesanan->id,
        'nama_pelanggan'  => 'required|string|max:255',
        'tipe_kamar'      => 'required|string|max:255',
        'total_harga'     => 'required|numeric',
        'foto'            => 'nullable|image|max:2048',
    ]);

    $data = $request->only(['no_pemesanan', 'nama_pelanggan', 'tipe_kamar', 'total_harga']);

    if ($request->hasFile('foto')) {
        if ($pemesanan->foto && Storage::disk('public')->exists($pemesanan->foto)) {
            Storage::disk('public')->delete($pemesanan->foto);
        }
        $data['foto'] = $request->file('foto')->store('pemesanan_foto', 'public');
    }

    $pemesanan->update($data);

    return redirect()->route('pemesanan.index')->with('success', 'Data pemesanan berhasil diperbarui.');
}


    // Hapus data
    public function destroy($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        if ($pemesanan->foto && Storage::disk('public')->exists($pemesanan->foto)) {
            Storage::disk('public')->delete($pemesanan->foto);
        }

        $pemesanan->delete();
        return redirect()->route('pemesanan.index')->with('success', 'Data pelanggan berhasil dihapus');
    }
    public function edit($id)
{
    $pemesanan = Pemesanan::findOrFail($id);
    return view('layouts.pemesanan.edit', compact('pemesanan'));
}

}
