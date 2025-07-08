<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pelanggan;

class pelangganController extends Controller
{
    public function index()
    {
        $pelanggan = pelanggan::all();
        return view('layouts.Pelanggan.index', compact('pelanggan'));
    }

    public function create()
    {
        return view('layouts.Pelanggan.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'no_hp' => 'required|string',
        ]);

        $pelanggan = new Pelanggan;
        $pelanggan->nama   = $request->nama;
        $pelanggan->alamat  = $request->alamat;
        $pelanggan->jenis_kelamin  = $request->jenis_kelamin;
        $pelanggan->no_hp      = $request->no_hp;
        $pelanggan->save();


         return redirect('/pelanggan');  

    }

    public function edit(Pelanggan $pelanggan)
    {
        return view('layouts.Pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
        ]);

        $pelanggan->update($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil diperbarui');
    }

    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil dihapus');
    }
}