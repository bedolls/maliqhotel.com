@extends('layouts.template')

@section('content')
<div class="container">
    <h3>Edit Pemesanan</h3>
    <form action="{{ route('pemesanan.update', $pemesanan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="pelanggan_id" class="form-label">Pelanggan</label>
            <select name="pelanggan_id" class="form-control" required>
                @foreach($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->id }}" {{ $pemesanan->pelanggan_id == $pelanggan->id ? 'selected' : '' }}>
                        {{ $pelanggan->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="kamar_id" class="form-label">Tipe Kamar</label>
            <select name="kamar_id" id="kamar_id" class="form-control" required>
                @foreach($kamars as $kamar)
                    <option value="{{ $kamar->id }}" data-harga="{{ $kamar->harga }}" {{ $pemesanan->kamar_id == $kamar->id ? 'selected' : '' }}>
                        {{ $kamar->tipe_kmr }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="check_in" class="form-label">Check-in</label>
            <input type="date" name="check_in" id="check_in" value="{{ $pemesanan->check_in }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="check_out" class="form-label">Check-out</label>
            <input type="date" name="check_out" id="check_out" value="{{ $pemesanan->check_out }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control">
            @if($pemesanan->foto)
                <img src="{{ asset('storage/' . $pemesanan->foto) }}" width="100" class="img-thumbnail mt-2">
            @endif
        </div>

        <div class="mb-3">
            <label for="total_harga" class="form-label">Total Harga</label>
            <input type="text" name="total_harga" id="total_harga" value="{{ $pemesanan->total_harga }}" class="form-control" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<script>
    function hitungTotal() {
        const harga = parseFloat(document.querySelector('#kamar_id option:checked')?.getAttribute('data-harga') || 0);
        const checkIn = new Date(document.getElementById('check_in').value);
        const checkOut = new Date(document.getElementById('check_out').value);
        if (harga && checkIn && checkOut && checkOut > checkIn) {
            const selisihHari = (checkOut - checkIn) / (1000 * 3600 * 24);
            document.getElementById('total_harga').value = harga * selisihHari;
        }
    }

    document.getElementById('kamar_id').addEventListener('change', hitungTotal);
    document.getElementById('check_in').addEventListener('change', hitungTotal);
    document.getElementById('check_out').addEventListener('change', hitungTotal);
</script>
@endsection
