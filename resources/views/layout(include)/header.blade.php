<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/assets/css/oneui.min.css')}}">
    <title>{{$title}}</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Beranda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/kamar">Kamar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/pelanggan">Pelanggan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/karyawan">Karyawan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link acitve" href="/pemesanan">Pemesanan</a>
                </li>

                </ul>
                <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>