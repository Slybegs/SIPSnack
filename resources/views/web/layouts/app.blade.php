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
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/index.css') }}" rel="stylesheet">
  <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/sweetalert/sweetalert.css') }}">
  <script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
    @vite(['resources/sass/app.scss','resources/js/app.js',])
  @show

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>
    {{-- @include('sweet::alert') --}}
     
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="#">SIPSnack</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="nosubmit me-auto">
                <input type="text" class="form-control nosubmit" placeholder="Search...">
              </form>
            <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      
        <div id="mySidenav" class="sidenav">
          <div class="container">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="user-data">
              <div class="user-photo" style="background: url({{asset('images/user-null.png')}}) no-repeat center center;background-size: cover;"></div>
              <div class="user-detail">
                <div class="user-name">Sly</div>
                <div class="user-country">Medan,Indonesia</div>
              </div>
            </div>
            <table class="table">
             <tr>
              <td><a href="{{ url('/cart') }}">My Cart</a> </td>
              <td><span class="badge">2</span></td>
            </tr>
            <tr>
              <td><a href="#">Wishlist</a> </td><td><span class="badge">2</span></td>
            </tr>
            <tr>
              <td><a href="#">My Profile</a> </td><td><span class="badge">2</span></td>
            </tr>
            <tr>
              <td><a href="#">My Orders</a> </td><td><span class="badge">2</span></td>
            </tr>
            <tr>
              <td><a href="#">Settings</a> </td><td><span class="glyphicon glyphicon-cog"></span></td>
            </tr>
            <tr>
              <td>
                <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  Log Out
                </a> 
              </td>
              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
                <input type="submit" value="logout" style="display: none;">
              </form>
              <td><span class="glyphicon glyphicon-off"></span></td>
            </tr>
          </table>
        </div>
      </div>

    @yield('content')

{{-- <footer id="myFooter" class="col-xs-12 col-sm-12 col-md-12">
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <h3 class="logo"><a href="#"> SIPSnack</a></h3>
        <ul>
          <li class="social-networks">Follow us :
            <a href="#" class="twitter"><i class="fa fa-instagram"></i></a>
            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
          </li>
          <li><button type="button" class="btn btn-default">Contact us</button></li>
        </ul>
      </div>
      <div class="footer-menu col-sm-3">
        <h5>Get started<hr class="footer-hr"></h5>
        <ul>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li><a href="{{ url('/Category') }}">Category</a></li>
          <li><a href="{{ url('/product') }}">Products</a></li>
          <li><a href="#">Sign up</a></li>
        </ul>
      </div>
      <div class="footer-menu col-sm-3">
        <h5>About us<hr class="footer-hr"></h5>
        <ul>
          <li><a href="#">Company Information</a></li>
          <li><a href="#">Contact us</a></li>
        </ul>
      </div>
      <div class="footer-menu col-sm-3">
        <h5>Information<hr class="footer-hr"></h5>
        <ul>
          <li><p><i class="fa fa-map-marker">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>Jln. Bilal no 53</p></li>
          <li><p><i class="fa fa-phone">&nbsp;&nbsp;&nbsp;&nbsp;</i>+6281-2652-66955</p></li>
          <li><p><i class="fa fa-clock-o">&nbsp;&nbsp;&nbsp;&nbsp;</i>10.00 - 20.00</p></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <p>©Copyright Abadi Helm, 2017. All rights reserved.</p>
  </div>
</footer> --}}

<script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "300px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }
</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
@yield('script')
</body>
</html>