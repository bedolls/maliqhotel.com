@extends('layouts.template')
@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Daftar Kamar</h3>
                  <a href="{{ url('/kamar/create') }}">Tambah Kamar <i class="fa fa-plus me-1"></i> </a>
                       
                    </a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Tipe Kamar</th>
                                    <th>Kapasitas</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kamar as $index => $kamar)
                                    <tr class="text-center">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ ucfirst($kamar->tipe_kmr->value ?? $kamar->tipe_kmr) }}</td>
                                        <td>{{ $kamar->kapasitas }} orang</td>
                                        <td>Rp{{ number_format($kamar->harga, 0, ',', '.') }}</td>
                                        <td>
                                            <a href="{{ route('kamar.edit', $kamar->id) }}" class="btn btn-sm btn-warning me-1">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('kamar.destroy', $kamar->id) }}" method="POST" class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus kamar ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">Belum ada data kamar.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
