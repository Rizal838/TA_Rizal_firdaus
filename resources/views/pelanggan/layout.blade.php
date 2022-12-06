<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 <head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=devicewidth, initial-scale=1">
 <title>Tugas Akhir</title>
 <!-- Fonts -->
 <link 
href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
 <!-- Styles -->
 <link 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
 <style>
 body {
 font-family: 'Nunito', sans-serif;
 }
 </style>
 </head>
 <body class="antialiased">
 <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-0 mb-lg-0">
        <li class=" nav-item">
          <a class="nav-link" aria-current="page" href="/pelanggan">Pelanggan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/pembayaran">Pembayaran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/rute">Rute</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/maskapai">Maskapai</a>
        </li>
      </ul>
      <form class="d-flex" method="post" action="/logout">
        @csrf
        <button class="btn btn-outline-secondary" type="submit">Keluar</button>
      </form>
    </div>
  </div>
</nav>
 <div class="container">
 @yield('content')
 </div>
 <script 
src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
 </body>
</html>