<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>SIPSnack | @yield('title', 'Login')</title>

  <!-- Bootstrap -->
  @section('css')
    @vite(['resources/sass/app.scss','resources/js/app.js',])
  @show
    </head>
    <body class="bg-white">
     
    <nav class="navbar navbar-expand-lg navbar-light bg-white mb-5 shadow-none">
        <div class="container">
          <a class="navbar-brand mx-auto" href="#">SIPSnack</a>
        </div>
      </nav>
    </div>

    @yield('content')

@yield('script')
</body>
</html>