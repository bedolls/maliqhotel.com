@extends('layouts.template')

@section('content')
<div class="container">
  <h3>Form Pemesanan</h3>
  <form action="{{ isset($pemesanan) ? route('pemesanan.update', $pemesanan->id) : route('pemesanan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($pemesanan)) @method('PUT') @endif

    <div class="mb-3">
    <label for="pelanggan_id" class="form-label">Pelanggan</label>
    <select name="pelanggan_id" id="pelanggan_id" class="form-control" required>
        <option value="">-- Pilih Pelanggan --</option>
        @foreach ($pelanggans as $pelanggan)
            <option value="{{ $pelanggan->id }}"
                {{ old('pelanggan_id') == $pelanggan->id ? 'selected' : '' }}>
                {{ $pelanggan->nama }}
            </option>
        @endforeach
    </select>
</div>
        </div>

    <div class="mb-3">
      <label for="kamar_id" class="form-label">Tipe Kamar</label>
      <select class="form-control" name="kamar_id" id="kamar_id" required>
        <option value="">-- Pilih Kamar --</option>
        @foreach($kamars as $kamar)
          <option value="{{ $kamar->id }}" data-harga="{{ $kamar->harga }}"
            {{ (old('kamar_id', $pemesanan->kamar_id ?? '') == $kamar->id) ? 'selected' : '' }}>
            {{ ucfirst($kamar->tipe_kmr) }} - Rp{{ number_format($kamar->harga, 0, ',', '.') }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="check_in" class="form-label">Check In</label>
      <input type="date" class="form-control" name="check_in" id="check_in" value="{{ old('check_in', $pemesanan->check_in ?? '') }}" required>
    </div>

    <div class="mb-3">
      <label for="check_out" class="form-label">Check Out</label>
      <input type="date" class="form-control" name="check_out" id="check_out" value="{{ old('check_out', $pemesanan->check_out ?? '') }}" required>
    </div>

    <div class="mb-3">
      <label for="total_harga" class="form-label">Total Harga</label>
      <input type="text" class="form-control" name="total_harga" id="total_harga" value="{{ old('total_harga', $pemesanan->total_harga ?? '') }}" readonly>
    </div>

    <div class="mb-3">
      <label for="foto" class="form-label">Foto</label>
      <input type="file" class="form-control" name="foto">
      @if(isset($pemesanan) && $pemesanan->foto)
        <img src="{{ asset('storage/' . $pemesanan->foto) }}" width="100" class="mt-2 img-thumbnail">
      @endif
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
  </form>
</div>

<script>
  function hitungTotalHarga() {
    const harga = document.querySelector('#kamar_id').selectedOptions[0]?.getAttribute('data-harga') ?? 0;
    const checkIn = new Date(document.querySelector('#check_in').value);
    const checkOut = new Date(document.querySelector('#check_out').value);
    const totalHargaField = document.querySelector('#total_harga');

    if (checkIn && checkOut && !isNaN(checkIn) && !isNaN(checkOut)) {
      const selisihHari = (checkOut - checkIn) / (1000 * 60 * 60 * 24);
      if (selisihHari >= 0) {
        totalHargaField.value = harga * (selisihHari || 1);
      } else {
        totalHargaField.value = '';
      }
    }
  }

  document.querySelector('#kamar_id').addEventListener('change', hitungTotalHarga);
  document.querySelector('#check_in').addEventListener('change', hitungTotalHarga);
  document.querySelector('#check_out').addEventListener('change', hitungTotalHarga);
</script>
@endsection
