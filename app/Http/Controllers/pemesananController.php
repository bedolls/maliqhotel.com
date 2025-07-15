<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanan = Pemesanan::with('kamar')->get(); // gunakan eager loading
        return view('layouts.Pemesanan.index', compact('pemesanan'));
    }

    public function create()
    {
        $kamars = Kamar::all();
        return view('layouts.Pemesanan.form', compact('kamars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_pemesanan'   => 'required|unique:pemesanans,no_pemesanan',
            'nama_pelanggan' => 'required|string|max:255',
            'check_in'       => 'required|date',
            'check_out'      => 'required|date|after_or_equal:check_in',
            'kamar_id'       => 'required|exists:kamars,id',
            'total_harga'    => 'required|numeric',
            'foto'           => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['no_pemesanan', 'nama_pelanggan', 'check_in', 'check_out', 'kamar_id', 'total_harga']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('pemesanan_foto', 'public');
        }

        Pemesanan::create($data);

        return redirect()->route('pemesanan.index')->with('success', 'Data pemesanan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $kamars = Kamar::all();
        return view('layouts.Pemesanan.edit', compact('pemesanan', 'kamars'));
    }

    public function update(Request $request, $id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        $request->validate([
            'no_pemesanan'   => 'required|unique:pemesanans,no_pemesanan,' . $pemesanan->id,
            'nama_pelanggan' => 'required|string|max:255',
            'check_in'       => 'required|date',
            'check_out'      => 'required|date|after_or_equal:check_in',
            'kamar_id'       => 'required|exists:kamars,id',
            'total_harga'    => 'required|numeric',
            'foto'           => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['no_pemesanan', 'nama_pelanggan', 'check_in', 'check_out', 'kamar_id', 'total_harga']);

        if ($request->hasFile('foto')) {
            if ($pemesanan->foto && Storage::disk('public')->exists($pemesanan->foto)) {
                Storage::disk('public')->delete($pemesanan->foto);
            }
            $data['foto'] = $request->file('foto')->store('pemesanan_foto', 'public');
        }

        $pemesanan->update($data);

        return redirect()->route('pemesanan.index')->with('success', 'Data pemesanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        if ($pemesanan->foto && Storage::disk('public')->exists($pemesanan->foto)) {
            Storage::disk('public')->delete($pemesanan->foto);
        }

        $pemesanan->delete();

        return redirect()->route('pemesanan.index')->with('success', 'Data pemesanan berhasil dihapus.');
    }
}
