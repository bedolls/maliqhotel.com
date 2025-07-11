<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use Illuminate\Support\Facades\Storage;

class kamarController extends Controller
{
    // Tampilkan semua kamar
    public function index()
    {
        $nomor = 1;
        $kamar = Kamar::all();
        return view('layouts.kamar.index', compact('kamar', 'nomor'));
    }

    // Form tambah kamar
    public function create()
    {
        return view('layouts.kamar.form');
    }

    // Simpan kamar baru
    public function store(Request $request)
    {
        $request->validate([
            'tipe_kmr'    => 'required|in:standar,deluxe,deluxe view,superior,suite,excecutive,family one,family two,vip',
            'kapasitas'  => 'required|numeric|min:1',
            'harga'      => 'required|numeric|min:0',
            'foto_kamar' => 'nullable|image|max:2048', // max 2MB
        ]);

        $data = $request->only(['tipe_kmr', 'kapasitas', 'harga']);

        if ($request->hasFile('foto_kamar')) {
            $data['foto_kamar'] = $request->file('foto_kamar')->store('foto_kamar', 'public');
        }

        Kamar::create($data);

        return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil ditambahkan.');
    }

    // Form edit
    public function edit($id)
    {
        $kamar = Kamar::findOrFail($id);
        return view('layouts.kamar.edit', compact('kamar'));
    }

    // Update kamar
    public function update(Request $request, $id)
    {
        $kamar = Kamar::findOrFail($id);

        $request->validate([
            'tipe_kmr'    => 'required|in:standar,deluxe,deluxe view,superior,suite,excecutive,family one,family two,vip',
            'kapasitas'  => 'required|numeric|min:1',
            'harga'      => 'required|numeric|min:0',
            'foto_kamar' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['tipe_kmr', 'kapasitas', 'harga']);

        // Jika ada file foto baru diupload
        if ($request->hasFile('foto_kamar')) {
            // Hapus foto lama jika ada
            if ($kamar->foto_kamar && Storage::disk('public')->exists($kamar->foto_kamar)) {
                Storage::disk('public')->delete($kamar->foto_kamar);
            }

            // Simpan foto baru
            $data['foto_kamar'] = $request->file('foto_kamar')->store('foto_kamar', 'public');
        }

        $kamar->update($data);

        return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil diperbarui.');
    }

    // Hapus kamar
    public function destroy($id)
    {
        $kamar = Kamar::findOrFail($id);

        // Hapus file foto dari storage jika ada
        if ($kamar->foto_kamar && Storage::disk('public')->exists($kamar->foto_kamar)) {
            Storage::disk('public')->delete($kamar->foto_kamar);
        }

        $kamar->delete();

        return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil dihapus.');
    }
}
