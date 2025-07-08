@extends('layouts.template')

@section('content')
<div class="container">
  <h3>Tambah Kamar</h3>
  <form action="{{ route('kamar.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="tipe_kmr" class="form-label">Tipe Kamar</label>
      <select class="form-control" name="tipe_kmr" required>
        <option value="standar">Standar</option>
        <option value="deluxe">Deluxe</option>
        <option value="deluxe view">Deluxe view</option>
        <option value="superior">Superior</option>
        <option value="suite">Suite</option>
        <option value="excecutive">Excecutive</option>
        <option value="family">Familly</option>
       <option value="vip">VIP</option> 
      </select>
    </div>
    <div class="mb-3">
      <label for="kapasitas" class="form-label">Kapasitas</label>
      <input type="number" class="form-control" name="kapasitas" required>
    </div>
    <div class="mb-3">
      <label for="harga" class="form-label">Harga</label>
      <input type="text" class="form-control" name="harga" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
  </form>
</div>
@endsection
