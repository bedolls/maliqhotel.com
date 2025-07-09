@extends('layouts.template')
@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Daftar karyawan</h3>
                    <a href="{{ route('karyawan.create') }}" class="btn btn-primary">Tambah Karyawan</a>
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
                                    <th>No hp</th>
                                    <th>Alamat</th>
                                    <th>umur</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($karyawan as $k)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $k->nm_kry }}</td>
                                        <td>{{ $k->no_hp }}</td>
                                        <td>{{ $k->alamat_kry}}</td>
                                        <td>{{ $k->umur_kry }}</td>
                                        <td>
                                            <a href="{{ route('karyawan.edit', $k->id) }}"
                                             class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('karyawan.destroy', $k->id) }}"
                                             method="POST" class="d-inline" 
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
                                        <td colspan="5" class="text-center">Tidak ada data karyawan.</td>
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