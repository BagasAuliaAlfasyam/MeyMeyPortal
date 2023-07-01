<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>Mey Mey Portal</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="{{ route('mahasiswa.home') }}">MeyMey Portal</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto ">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('mahasiswa.home') }}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('mahasiswa.krs') }}">KRS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('mahasiswa.khs') }}">KHS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('mahasiswa.comingsoon') }}">Transkip Nilai</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0 " method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="btn btn-secondary my-2 my-sm-0" type="submit">Logout</button>
        </form>
      </div>
    </div>
  </nav>

  @if (session()->has('message'))
    <div class="content-header mb-0 pb-0">
      <div class="container-fluid">
        <div class="mb-0 alert alert-{{ session()->get('alert-type') }} alert-dismissible fade show" role="alert">
          <strong>{{ session()->get('message') }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div><!-- /.container-fluid -->
    </div>
  @endif


  @yield('main')

  <footer class="bg-secondary text-white py-3 fixed-bottom">
    <div class="container">
      <p class="float-right d-none d-sm-inline font-size-3">
        Anything you want
      </p>
      <strong>Copyright &copy; {{ date('Y') }} <a class="text-light" href="https://Instagram.com/">MeyMey</a>.</strong> All rights reserved.
    </div>
  </footer>
  </div>
</body>

</html>
