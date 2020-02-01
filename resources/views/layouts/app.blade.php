<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>@yield('title') - {{config('app.name')}}</title>
<meta name="description" content=" ">
<meta name="Author" content=" ">
<meta name="keywords" content=" " />
<meta name="author" content="metatags generator">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="3 days">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{ asset('css/site.css') }}">
      <!-- <script src="{{ asset('js2/jquery.min.js') }}" ></script> -->

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}"><img src="
      {{ url('img/MTN-logo.png') }}" alt="Bootstrappin'"
        width="120">
                        {{ config('app.name', 'Laravel') }}
                    </a>

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">

                      @auth

  <!-- {{ Auth::user()->name }} -->
      @if(checkPermission(['customer']))

        <li><a href="{{ route('login') }}">Create Food Menu</a></li>
        <li><a href="{{ route('register') }}">Update food Menu</a></li>
        <li><a href="{{ route('register') }}">View Sales</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count(session('cart')) }}</span>
            </a>

            <ul class="dropdown-menu">
              <div class="row total-header-section">
                  <div class="col-lg-6 col-sm-6 col-6">
                      <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count(session('cart')) }}</span>
                  </div>

                  <?php $total = 0 ?>
                  @foreach(session('cart') as $id => $details)
                      <?php $total += $details['price'] * $details['quantity'] ?>
                  @endforeach

                  <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                      <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                  </div>
              </div>

              @if(session('cart'))
                  @foreach(session('cart') as $id => $details)
                      <div class="row cart-detail">
                          <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                              <img src="{{ $details['photo'] }}" />
                          </div>
                          <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                              <p>{{ $details['name'] }}</p>
                              <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                          </div>
                      </div>
                  @endforeach
              @endif
              <div class="row">
                  <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                      <a href="{{ url('cart') }}" class="btn btn-primary btn-block">View all</a>
                  </div>
              </div>
            </ul>
        </li>

                    @elseif(checkPermission(['administrator']))
                      <li><a href="{{ route('tickets') }}">Tickets</a></li>
                      <li><a href="{{ route('data') }}">Data</a></li>
                      <li><a href="{{ route('register') }}">Register</a></li>
    @elseif(checkPermission(['staff']))


@elseif(checkPermission(['invaliduser']))

@else
      I don't have any records!
  @endif
  @endauth
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest


                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
  <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Scripts -->
    <!-- <script src="{{ asset('js2/jquery.min.js') }}" ></script>
    <script src="{{ asset('js2/popper.min.js') }}" ></script>
  <script src="{{ asset('js2/bootstrap.min.js') }}"></script> -->
  <script src="{{ asset('js/site.js') }}"></script>

    @yield('javascript')
</body>
</html>
