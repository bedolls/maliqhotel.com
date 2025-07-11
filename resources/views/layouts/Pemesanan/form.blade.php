@extends('layouts.template')

@section('content')
<div class="container-fluid mt-4">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="mb-0">
                {{ isset($pemesanan) ? 'Edit Pemesanan' : 'Tambah Pemesanan' }}
            </h3>
        </div>
        <div class="card-body">
            {{-- Tampilkan error validasi --}}
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

            <form 
                action="{{ isset($pemesanan) ? route('pemesanan.update', $pemesanan->id) : route('pemesanan.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($pemesanan))
                    @method('PUT')
                @endif

                {{-- No Pemesanan --}}
                <div class="mb-3">
                    <label for="no_pemesanan" class="form-label">No Pemesanan</label>
                    <input type="text" class="form-control" name="no_pemesanan" id="no_pemesanan"
                        value="{{ old('no_pemesanan', $pemesanan->no_pemesanan ?? '') }}" required>
                </div>

              <!-- Input manual: Nama Pelanggan -->
               <!-- Nama Pelanggan -->
<div class="mb-3">
    <label>Nama Pelanggan</label>
    <input type="text" name="nama_pelanggan" class="form-control"
        value="{{ old('nama_pelanggan', $pemesanan->nama_pelanggan ?? '') }}" required>
</div>

<!-- Tipe Kamar -->
<div class="mb-3">
    <label for="tipe_kamar" class="form-label">Tipe Kamar</label>
    <select class="form-control" name="tipe_kamar" required>
        <option value="">-- Pilih Tipe Kamar --</option>
        @php
            $tipeOptions = ['standar', 'deluxe', 'deluxe view', 'superior', 'suite', 'excecutive', 'family', 'vip'];
        @endphp
        @foreach($tipeOptions as $tipe)
            <option value="{{ $tipe }}" {{ old('tipe_kamar', $pemesanan->tipe_kamar ?? '') == $tipe ? 'selected' : '' }}>
                {{ ucfirst($tipe) }}
            </option>
        @endforeach
    </select>
</div>

{{-- Check In --}}
<div class="mb-3">
    <label for="check_in" class="form-label">Check In</label>
    <input type="date" class="form-control" name="check_in" id="check_in"
        value="{{ old('check_in', $pemesanan->check_in ?? '') }}">
</div>

{{-- Check Out --}}
<div class="mb-3">
    <label for="check_out" class="form-label">Check Out</label>
    <input type="date" class="form-control" name="check_out" id="check_out"
        value="{{ old('check_out', $pemesanan->check_out ?? '') }}">
</div>


                {{-- Total Harga --}}
                <div class="mb-3">
                    <label for="total_harga" class="form-label">Total Harga</label>
                    <input type="text" class="form-control" name="total_harga" id="total_harga"
                        value="{{ old('total_harga', $pemesanan->total_harga ?? '') }}" required>
                </div>

                {{-- Foto --}}
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Bukti</label>
                    <input type="file" class="form-control" name="foto" id="foto">
                    @if(isset($pemesanan) && $pemesanan->foto)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $pemesanan->foto) }}" width="120" class="img-thumbnail">
                        </div>
                    @endif
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('pemesanan.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
