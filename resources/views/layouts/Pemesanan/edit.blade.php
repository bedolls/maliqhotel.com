@extends('layouts.template')

@section('content')
<div class="container-fluid mt-4">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="mb-0">Edit Pemesanan</h3>
        </div>
        <div class="card-body">
            {{-- Validasi error --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan!</strong>
                    <ul class="mb-0 mt-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pemesanan.update', $pemesanan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- No Pemesanan --}}
                <div class="mb-3">
                    <label for="no_pemesanan" class="form-label">No Pemesanan</label>
                    <input type="text" class="form-control" id="no_pemesanan" name="no_pemesanan"
                        value="{{ old('no_pemesanan', $pemesanan->no_pemesanan) }}" required>
                </div>

                {{-- Nama Pelanggan --}}
                <div class="mb-3">
                    <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan"
                        value="{{ old('nama_pelanggan', $pemesanan->nama_pelanggan) }}" required>
                </div>

                {{-- Tipe Kamar --}}
                <div class="mb-3">
                    <label for="tipe_kamar" class="form-label">Tipe Kamar</label>
                    <select name="tipe_kamar" id="tipe_kamar" class="form-control" required>
                        <option value="">-- Pilih Tipe Kamar --</option>
                        @foreach(['standar','deluxe','deluxe view','superior','suite','excecutive','family','vip'] as $tipe)
                            <option value="{{ $tipe }}"
                                {{ old('tipe_kamar', $pemesanan->tipe_kamar) == $tipe ? 'selected' : '' }}>
                                {{ ucfirst($tipe) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Total Harga --}}
                <div class="mb-3">
                    <label for="total_harga" class="form-label">Total Harga</label>
                    <input type="text" class="form-control" id="total_harga" name="total_harga"
                        value="{{ old('total_harga', $pemesanan->total_harga) }}" required>
                </div>

                {{-- Foto --}}
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Bukti</label>
                    <input type="file" class="form-control" id="foto" name="foto">
                    @if($pemesanan->foto)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $pemesanan->foto) }}" width="120" class="img-thumbnail">
                        </div>
                    @endif
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('pemesanan.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
