@extends('layouts.template')

@section('title', 'Tambah Karyawan')
@section('headline', 'Tambah Karyawan')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">Form Tambah Pelanggan</div>
        <div class="card-body">
          @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
<form action="{{ route('karyawan.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nm_kry" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>No HP</label>
        <input type="text" name="no_hp" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat_kry" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label>Umur</label>
        <input type="number" name="umur_kry" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Kembali</a>
</form>
</div>
</div>
</div>
@endsection
