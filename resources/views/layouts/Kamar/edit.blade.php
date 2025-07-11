@extends('layouts.template')

@section('content')
<div class="container">
  <h3>Edit Kamar</h3>
  <form action="{{ route('kamar.update', $kamar->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="tipe_kmr" class="form-label">Tipe Kamar</label>
      <select class="form-control" name="tipe_kmr" required>
        <option value="standar" {{ $kamar->tipe_kmr == 'standar' ? 'selected' : '' }}>Standar</option>
        <option value="deluxe" {{ $kamar->tipe_kmr == 'deluxe' ? 'selected' : '' }}>Deluxe</option>
        <option value="deluxe view" {{ $kamar->tipe_kmr == 'deluxe view' ? 'selected' : '' }}>Deluxe View</option>
        <option value="superior" {{ $kamar->tipe_kmr == 'superior' ? 'selected' : '' }}>Superior</option>
        <option value="suite" {{ $kamar->tipe_kmr == 'suite' ? 'selected' : '' }}>Suite</option>
        <option value="excecutive" {{ $kamar->tipe_kmr == 'excecutive' ? 'selected' : '' }}>Excecutive</option>
        <option value="family_one" {{ $kamar->tipe_kmr == 'family_one' ? 'selected' : '' }}>Family 1</option>
         <option value="family_two" {{ $kamar->tipe_kmr == 'family_two' ? 'selected' : '' }}>Family 2</option>
        <option value="vip" {{ $kamar->tipe_kmr == 'vip' ? 'selected' : '' }}>VIP</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="foto_kamar" class="form-label">Foto Kamar</label>
      <input type="file" name="foto_kamar" class="form-control">
      @if($kamar->foto_kamar)
        <div class="mt-2">
          <img src="{{ asset('storage/' . $kamar->foto_kamar) }}" width="100" class="img-thumbnail">
          <p class="text-muted mt-1">Foto saat ini</p>
        </div>
      @endif
    </div>

    <div class="mb-3">
      <label for="kapasitas" class="form-label">Kapasitas</label>
      <input type="number" class="form-control" name="kapasitas" value="{{ old('kapasitas', $kamar->kapasitas) }}" required>
    </div>

    <div class="mb-3">
      <label for="harga" class="form-label">Harga</label>
      <input type="text" class="form-control" name="harga" value="{{ old('harga', $kamar->harga) }}" required>
    </div>

    <button type="submit" class="btn btn-success">Perbarui</button>
    <a href="{{ route('kamar.index') }}" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection
