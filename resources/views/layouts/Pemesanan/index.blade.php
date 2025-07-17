@extends('layouts.template')

@section('content')
<div class="container">
    <h3>Data Pemesanan</h3>
    <a href="{{ route('pemesanan.create') }}" class="btn btn-success mb-3">Tambah Pemesanan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Pelanggan</th>
                <th>Tipe Kamar</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Foto</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pemesanan as $item)
            <tr>
                <td>{{ $item->pelanggan->nama ?? '-' }}</td>
                <td>{{ $item->kamar->tipe_kmr }}</td>
                <td>{{ $item->check_in }}</td>
                <td>{{ $item->check_out }}</td>
                <td>
                    @if($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" width="60">
                    @else
                        -
                    @endif
                </td>
                <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                <td>
                    <a href="{{ route('pemesanan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pemesanan.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
