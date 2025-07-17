@extends('layouts.template')

@section('content')
<div class="container mt-4">
    <h3>Daftar Pemesanan</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('pemesanan.create') }}" class="btn btn-success mb-3">Tambah Pemesanan</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Pelanggan</th>
                <th>Tipe Kamar</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Total Harga</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pemesanan as $p)
                <tr>
                    <td>{{ $p->pelanggan->nama ?? '-' }}</td>
                    <td>{{ $p->kamar->tipe_kmr ?? '-' }}</td>
                    <td>{{ $p->check_in }}</td>
                    <td>{{ $p->check_out }}</td>
                    <td>Rp {{ number_format($p->total_harga, 0, ',', '.') }}</td>
                    <td>
                        @if ($p->foto)
                            <img src="{{ asset('storage/' . $p->foto) }}" width="80">
                        @else
                            Tidak ada
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('pemesanan.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pemesanan.destroy', $p->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
