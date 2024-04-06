<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" >

    <title>@yield('title','Geeky Vault')</title>
  </head>
  <body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">Geeky Vault</a>
            <div class="vr bg-white mx-2 d-none d-lg-block"></div>
            <a class="navbar-brand" href="{{ route('marvel.index') }}">Marvel Partnership</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="{{ route('home.index') }}">Home</a>
                    <a class="nav-link active" href="{{ route('product.index') }}">Products</a>
                    <a class="nav-link active" href="{{ route('home.about') }}">About</a>
                    <!--auth part-->

                    <div class="vr bg-white mx-2 d-none d-lg-block"></div>
                    @guest 
                    <a class="nav-link active" href="{{ route('login') }}">Login</a>
                    <a class="nav-link active" href="{{ route('register') }}">Register</a>
                    @else
                    @if (Auth::user()->role == 'admin')
                    <a class="nav-link active" href="{{ route('admin.home.index') }}">Admin Page</a>
                    @endif
                    @if (Auth::user()->role == 'client')
                    <a class="nav-link active" href="{{ route('user.cart') }}">Cart</a>
                    <a class="nav-link active" href="{{ route('user.show') }}">Profile</a>
                    @endif
                    <form id="logout" action="{{route('logout')}}" method="POST">
                    <a role="button"class="nav-link active" id="logout" onclick="getElementById('logout').submit();">Logout </a>
                    @csrf 
                    </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <header class="masthead bg-primary text-white text-center py-4">
    <div class="container d-flex align-items-center flex-column">
        <h2>@yield('subtitle','Welcome to:  The Geeky Vault')</h2>
    </div>
    </header>
    <!-- header -->
    
    <div class="container my-4">
        @yield('content')
    </div>

      <!-- footer -->
    @include('layouts.footer')
    @yield('footer')

    <!-- footer -->
        <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        crossorigin="anonymous">
    </script>

  </body>
</html>