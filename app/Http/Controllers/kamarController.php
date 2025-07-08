<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;

class kamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // menampilkan data kamar
        $nomor = 1;
        $kamar = Kamar::all();
        return view('layouts.kamar.index',compact('kamar','nomor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          return view('layouts.Kamar.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          // Validasi data
        $request->validate([
            'tipe_kmr' => 'required|in:standar,deluxe,deluxe view,superior,suite,excecutive,family,vip',
            'kapasitas' => 'required|numeric|min:1',
            'harga' => 'required|string',
   
        ]);

        $kamar = new kamar;
        $kamar->tipe_kmr   = $request->tipe_kmr;
        $kamar->kapasitas  = $request->kapasitas;
        $kamar->harga      = $request->harga;
        $kamar->save();


        return redirect('/kamar');
    }

    public function edit($id)
{
    $kamar = Kamar::findOrFail($id);
    return view('layouts.Kamar.edit', compact('kamar'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'no_kmr' => 'required|numeric|min:0|unique:kamars,no_kmr',
        'tipe_kmr' => 'required|in:standar,deluxe,deluxe view,superior,suite,excecutive,family,vip',
        'kapasitas' => 'required|numeric|min:1',
        'harga' => 'required|numeric|min:0',
    ]);

    $kamar = Kamar::findOrFail($id);
    $kamar->update($request->all());

    return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil diperbarui.');
}

  public function destroy($id)
{
    $kamar = \App\Models\Kamar::findOrFail($id);
    $kamar->delete();

    return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil dihapus.');
}
}
