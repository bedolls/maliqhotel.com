<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class karyawanController extends Controller
{
    public function index()
    {
        $karyawan = karyawan::all();
        return view('layouts.karyawan.index', compact('karyawan'));
    }

    public function create()
    {
        return view('layouts.karyawan.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nm_kry' => 'required|string',
            'no_hp' => 'required|string',
            'alamat_kry' => 'required|string',
            'umur_kry' => 'required|integer|min:1'
        ]);

        $karyawan = new karyawan;
        $karyawan->nm_kry     = $request->nm_kry;
        $karyawan->no_hp      = $request->no_hp;
        $karyawan->alamat_kry = $request->alamat_kry;
        $karyawan->umur_kry   = $request->umur_kry;
        $karyawan->save();

          return redirect('/karyawan'); 
    }

    public function edit(Karyawan $karyawan)
    {
        return view('layouts.Karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'nm_kry' => 'required|string',
            'no_hp' => 'required|string',
            'alamat_kry' => 'required|string',
            'umur_kry' => 'required|integer|min:1'
        ]);

        $karyawan->update($request->all());

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diperbarui');
    }

    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil dihapus');
    }
}
