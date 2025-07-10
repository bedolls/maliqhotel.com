<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nomor = 1;
        $kamar = Kamar::all();
        return view('layouts.kamar.index', compact('kamar', 'nomor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.kamar.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipe_kmr'   => 'required|in:standar,deluxe,deluxe view,superior,suite,excecutive,family,vip',
            'kapasitas' => 'required|numeric|min:1',
            'harga'     => 'required|numeric|min:0',
        ]);

        $kamar = new Kamar;
        $kamar->tipe_kmr   = $request->tipe_kmr;
        $kamar->kapasitas  = $request->kapasitas;
        $kamar->harga      = $request->harga;
        $kamar->save();

        return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil ditambahkan.');
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kamar = Kamar::findOrFail($id);
        return view('layouts.kamar.edit', compact('kamar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kamar = Kamar::findOrFail($id);

        $request->validate([
            'tipe_kmr'   => 'required|in:standar,deluxe,deluxe view,superior,suite,excecutive,family,vip',
            'kapasitas' => 'required|numeric|min:1',
            'harga'     => 'required|numeric|min:0',
        ]);

        $kamar->update([
            'tipe_kmr'   => $request->tipe_kmr,
            'kapasitas' => $request->kapasitas,
            'harga'     => $request->harga,
        ]);

        return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->delete();

        return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil dihapus.');
    }
}
