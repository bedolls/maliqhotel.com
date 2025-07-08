@extends('layouts.template')
@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Daftar Pelanggan</h3>
                    <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">Tambah Pelanggan</a>
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
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No HP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pelanggan as $p)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->alamat }}</td>
                                        <td>{{ $p->jenis_kelamin }}</td>
                                        <td>{{ $p->no_hp }}</td>
                                        <td>
                                            <a href="{{ route('pelanggan.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('pelanggan.destroy', $p->id) }}" method="POST" class="d-inline" 
                                            onsubmit="return confirm('Yakin ingin menghapus?')">
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
                                        <td colspan="5" class="text-center">Tidak ada data pelanggan.</td>
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