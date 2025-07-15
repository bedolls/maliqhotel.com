@extends('layouts.template')

@section('content')
<div class="container mt-4">
    <h3>Tambah Pemesanan</h3>
    <form action="{{ route('pemesanan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>No Pemesanan</label>
            <input type="text" name="no_pemesanan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tipe Kamar</label>
            <select name="kamar_id" class="form-control" required>
                <option value="">-- Pilih Tipe Kamar --</option>
                @foreach($kamars as $kamar)
                    <option value="{{ $kamar->id }}">{{ ucfirst($kamar->tipe_kmr) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Check-In</label>
            <input type="date" name="check_in" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Check-Out</label>
            <input type="date" name="check_out" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Total Harga</label>
            <input type="number" name="total_harga" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
