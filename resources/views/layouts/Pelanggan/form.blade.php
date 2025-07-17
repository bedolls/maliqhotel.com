@extends('layouts.template')

@section('title', 'Tambah Pelanggan')
@section('headline') Tambah Pelanggan @endsection

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
            <form action="{{ route('pelanggan.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" required></textarea>
                </div>
               <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="Laki-laki" required>
                    <label class="form-check-label" for="laki_laki">Laki-laki</label>
                </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" required>
        <label class="form-check-label" for="perempuan">Perempuan</label>
    </div>
</div>

                <div class="mb-3">
                    <label for="no_hp" class="form-label">No HP</label>
                    <input type="text" name="no_hp" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
