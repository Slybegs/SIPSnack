<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>SIPSnack | @yield('title', 'Home')</title>

  <!-- Bootstrap -->
  @section('css')
    @vite(['resources/sass/app.scss','resources/js/app.js',])
  @show
    </head>
    <body class="bg-white">
     @include('web.layouts.toast')
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
          <a class="navbar-brand" href="/">SIPSnack</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="nosubmit me-auto" action="{{ route('produk.index') }}" method="GET">
                <input type="text" class="form-control nosubmit" name="search" placeholder="Search...">
              </form>
            <ul class="navbar-nav mb-2 mb-lg-0">
              @guest('web')
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="login">Login</a>
              </li>
              @endguest
              @auth('web')
              <li class="nav-item">
                <a class="nav-link" href="{{ route('transaksi.index')}}">Riwayat Belanja</a>
              </li>
              @endauth
              <li class="nav-item">
                <a class="nav-link" href="{{ route('keranjang.index') }}"><i class="fa-solid fa-cart-shopping"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      
      </div>

    @yield('content')

@stack('script')
</body>
</html>