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
