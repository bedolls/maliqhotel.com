@extends('layouts.template')

@section('content')
<div class="container-fluid mt-4">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h3 class="mb-0">Daftar Kamar</h3>
          <a href="{{ route('kamar.create') }}" class="btn btn-primary">
            Tambah kamar
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
                  <th>Foto Kamar</th>
                  <th>Kapasitas</th>
                  <th>Harga</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($kamar as $index => $k)
                  <tr class="text-center">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ ucfirst($k->tipe_kmr) }}</td>
                    <td>
                      @if($k->foto_kamar)
                        <img src="{{ asset('storage/' . $k->foto_kamar) }}" width="100" class="img-thumbnail">
                      @else
                        <span class="text-muted">Tidak ada foto</span>
                      @endif
                    </td>
                    <td>{{ $k->kapasitas }} orang</td>
                    <td>Rp{{ number_format($k->harga, 0, ',', '.') }}</td>
                    <td>
                      <a href="{{ route('kamar.edit', $k->id) }}" class="btn btn-sm btn-warning me-1">
                        <i class="fa fa-edit"></i> Edit
                      </a>
                      <form action="{{ route('kamar.destroy', $k->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kamar ini?')">
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
