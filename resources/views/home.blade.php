@extends('layouts.template')
@section('title')
    Halaman Dashboard
@endsection

@section('headline')
    Dashboard
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          Selamat Datang Admin, semoga harimu menyenangkan
        </div>
        <footer class="fixed-bottom bg-dark text-white py-2 mt-4 text-center">
    Copyright &copy; Abdul Malik Al Hanif - 2025
</footer>



<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
@endsection
