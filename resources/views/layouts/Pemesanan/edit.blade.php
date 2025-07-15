@extends('layouts.template')

@section('content')
<div class="container mt-4">
    <h3>Edit Pemesanan</h3>
    <form action="{{ route('pemesanan.update', $pemesanan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>No Pemesanan</label>
            <input type="text" name="no_pemesanan" class="form-control" value="{{ $pemesanan->no_pemesanan }}" required>
        </div>

        <div class="mb-3">
            <label>Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" class="form-control" value="{{ $pemesanan->nama_pelanggan }}" required>
        </div>

        <div class="mb-3">
            <label>Tipe Kamar</label>
            <select name="kamar_id" class="form-control" required>
                <option value="">-- Pilih Tipe Kamar --</option>
                @foreach($kamars as $kamar)
                    <option value="{{ $kamar->id }}" {{ $pemesanan->kamar_id == $kamar->id ? 'selected' : '' }}>
                        {{ ucfirst($kamar->tipe_kmr) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Check-In</label>
            <input type="date" name="check_in" class="form-control" value="{{ $pemesanan->check_in }}" required>
        </div>

        <div class="mb-3">
            <label>Check-Out</label>
            <input type="date" name="check_out" class="form-control" value="{{ $pemesanan->check_out }}" required>
        </div>

        <div class="mb-3">
            <label>Total Harga</label>
            <input type="number" name="total_harga" class="form-control" value="{{ $pemesanan->total_harga }}" required>
        </div>

        <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">
            @if($pemesanan->foto)
                <img src="{{ asset('storage/' . $pemesanan->foto) }}" width="100" class="img-thumbnail mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
