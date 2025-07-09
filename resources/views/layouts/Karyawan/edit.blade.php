@extends('layouts.template')

@section('title', 'Edit Karyawan')
@section('headline')
    Edit Karyawan 
@endsection

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">Form Edit Karyawan</div>
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
            <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nm_kry" class="form-label">Nama</label>
                    <input type="text" name="nm_kry" class="form-control" value="{{ old('nm_kry', $karyawan->nm_kry) }}" required>
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">No Hp</label>
                    <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $karyawan->no_hp) }}" required>
                </div>
                 <div class="mb-3">
                    <label for="alamat_kry" class="form-label">Alamat</label>
                    <input type="text" name="alamat_kry" class="form-control" value="{{ old('alamat_kry', $karyawan->alamat_kry) }}" required>
                </div>
                <div class="mb-3">
                    <label for="umur_kry" class="form-label">Umur</label>
                    <input type="text" name="umur_kry" class="form-control" value="{{ old('umur_kry', $karyawan->umur_kry) }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
