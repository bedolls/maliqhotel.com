@extends('layouts.template')

@section('title', 'Edit Pelanggan')
@section('headline')
    Edit Pelanggan 
@endsection

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">Form Edit Pelanggan</div>
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
            <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $pelanggan->nama) }}" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" required>{{ old('alamat', $pelanggan->alamat) }}</textarea>
                </div>
                 <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <input type="text" name="jenis_kelamin" class="form-control" value="{{ old('jenis_kelamin', $pelanggan->jenis_kelamin) }}" required>
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">No HP</label>
                    <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $pelanggan->no_hp) }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection