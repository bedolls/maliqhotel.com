@extends('layouts.template')

@section('content')
<div class="container-fluid mt-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Data Pemesanan</h3>
            <a href="{{ route('pemesanan.create') }}" class="btn btn-primary">Tambah Pemesanan</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>No Pemesanan</th>
                        <th>Nama Pelanggan</th>
                        <th>Tipe Kamar</th>
                        <th>Total Harga</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pemesanan as $index => $p)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $p->no_pemesanan }}</td>
                            <td>{{ $p->nama_pelanggan }}</td>
                            <td>{{ ucfirst($p->kamar->tipe_kmr ?? '-') }}</td>
                            <td>Rp{{ number_format($p->total_harga, 0, ',', '.') }}</td>
                            <td>
                                @if($p->foto)
                                    <img src="{{ asset('storage/' . $p->foto) }}" width="60" class="img-thumbnail">
                                @else
                                    <span class="text-muted">Tidak ada</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('pemesanan.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('pemesanan.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
