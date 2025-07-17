<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Kamar;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanan = Pemesanan::with(['kamar', 'pelanggan'])->get(); // Tambah 'pelanggan'
        return view('layouts.Pemesanan.index', compact('pemesanan'));
    }

    public function create()
    {
        $kamars = Kamar::all();
        $pelanggans = Pelanggan::all(); // Ambil semua pelanggan
        return view('layouts.Pemesanan.form', compact('kamars', 'pelanggans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id'    => 'required|exists:pelanggans,id',
            'kamar_id'        => 'required|exists:kamars,id',
            'check_in'        => 'required|date',
            'check_out'       => 'required|date|after_or_equal:check_in',
            'total_harga'     => 'required|numeric',
            'foto'            => 'nullable|image|max:2048',
        ]);

        $data = $request->only([
            'pelanggan_id',
            'kamar_id',
            'check_in',
            'check_out',
            'total_harga',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('pemesanan_foto', 'public');
        }

        Pemesanan::create($data);

        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $kamars = Kamar::all();
        $pelanggans = Pelanggan::all(); // Tambah data pelanggan
        return view('layouts.Pemesanan.edit', compact('pemesanan', 'kamars', 'pelanggans'));
    }

    public function update(Request $request, $id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        $request->validate([
            'pelanggan_id'    => 'required|exists:pelanggans,id',
            'kamar_id'        => 'required|exists:kamars,id',
            'check_in'        => 'required|date',
            'check_out'       => 'required|date|after_or_equal:check_in',
            'total_harga'     => 'required|numeric',
            'foto'            => 'nullable|image|max:2048',
        ]);

        $data = $request->only([
            'pelanggan_id',
            'kamar_id',
            'check_in',
            'check_out',
            'total_harga',
        ]);

        if ($request->hasFile('foto')) {
            if ($pemesanan->foto && Storage::disk('public')->exists($pemesanan->foto)) {
                Storage::disk('public')->delete($pemesanan->foto);
            }
            $data['foto'] = $request->file('foto')->store('pemesanan_foto', 'public');
        }

        $pemesanan->update($data);

        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        if ($pemesanan->foto && Storage::disk('public')->exists($pemesanan->foto)) {
            Storage::disk('public')->delete($pemesanan->foto);
        }

        $pemesanan->delete();

        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil dihapus.');
    }
}
