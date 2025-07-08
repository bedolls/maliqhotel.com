@extends('layouts.template')

@section('title', 'Edit Kamar')

@section('headline')
    Edit Data Kamar
@endsection

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h4 class="mb-0">Form Edit Kamar</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('kamar.update', $kamar->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="tipe_kmr" class="form-label">Tipe Kamar</label>
                            <select name="tipe_kmr" class="form-control" required>
                                @php
                                    $tipeList = ['standar', 'deluxe', 'deluxe view', 'superior', 'suite', 'excecutive', 'family', 'vip'];
                                @endphp
                                @foreach ($tipeList as $tipe)
                                    <option value="{{ $tipe }}" {{ old('tipe_kmr', $kamar->tipe_kmr) == $tipe ? 'selected' : '' }}>
                                        {{ ucfirst($tipe) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="kapasitas" class="form-label">Kapasitas</label>
                            <input type="number" name="kapasitas" class="form-control" value="{{ old('kapasitas', $kamar->kapasitas) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" name="harga" class="form-control" value="{{ old('harga', $kamar->harga) }}" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('kamar.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Update Kamar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
