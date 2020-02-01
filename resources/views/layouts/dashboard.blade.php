<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>@yield('title') - {{config('app.name')}}</title>
<meta name="description" content="Mtn Sales 2020 Conference  ">
<meta name="Author" content="Wristbands.NG ">
<meta name="keywords" content="Mtn Sales 2020 Conference  Wristbands" />
<meta name="author" content="metatags generator">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="3 days">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('yo/dist/css/AdminLTE.min.css') }}">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{ asset('css/site.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css2/dataTables.bootstrap.css') }}">
      <!-- <script src="{{ asset('js2/jquery.min.js') }}" ></script> -->
      <style>
      .blue{
        background-color: #dac369;
      }


      body{
        background-image: url("img/Pictures PNG.png");
        background-repeat:no-repeat;
        background-size:cover;
      }

      </style>
</head>
<body>
    <div id="app">
        <nav style="color:white;" class="navbar navbar-default navbar-static-top">
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
                    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('img/MTN-logo.png') }}" alt="{{config('app.name')}}"
        width="120">

                    </a>

                </div>

                <div  class="collapse navbar-collapse" id="app-navbar-collapse">
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
                      {{-- <li><a href="{{ route('tickets') }}">Tickets</a></li>
                      <li><a href="{{ route('data') }}">Data</a></li>
                      <li><a href="{{ route('register') }}">Register</a></li> --}}
    @elseif(checkPermission(['staff']))


@elseif(checkPermission(['invaliduser']))

@else
      I don't have any records!
  @endif
  @endauth
                        <!-- Authentication Links -->
                        @guest


                                <li><a href="{{ route('self') }}">Self Register </a></li>
                              <li><a href="{{ route('sq') }}">Scan Qrcode</a></li>
                            <li><a href="{{ route('v') }}">CheckIn</a></li>
                            <li><a href="{{ route('iv') }}">Iv CheckIn</a></li>
                              <li><a href="{{ route('iv2') }}">Iv</a></li>
                               <li><a href="{{ route('room') }}">Add Room</a></li>
                              <li><a href="{{ route('reg') }}">reg</a></li>
                              <li><a href="{{ route('report') }}">Attendance Report</a></li>
                            <li><a href="{{ route('aa') }}">Activitie Attendance</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    {{-- <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li> --}}
                                </ul>
                            </li>
                        @endguest


                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

<!-- Footer -->
    </div>
<br /><br /><br /><br /><br /><br />
    <!-- Footer -->
    <!-- Footer -->
    <footer class="page-footer font-small blue pt-4">

      <!-- Footer Links -->
      <div class="container-fluid text-center text-md-left">

        <!-- Grid row -->
        <div class="row">

          <!-- Grid column -->
          <div class="col-md-6 mt-md-0 mt-3">

            <!-- Content -->
            {{-- <h5 class="text-uppercase">Footer Content</h5>
            <p>Here you can use rows and columns to organize your footer content.</p> --}}

          </div>
          <!-- Grid column -->

          <hr class="clearfix w-100 d-md-none pb-3">

          <!-- Grid column -->
          <div class="col-md-3 mb-md-0 mb-3">

            <!-- Links -->
            {{-- <h5 class="text-uppercase">Links</h5>

            <ul class="list-unstyled">
              <li>
                <a href="#!">Link 1</a>
              </li>
              <li>
                <a href="#!">Link 2</a>
              </li>
              <li>
                <a href="#!">Link 3</a>
              </li>
              <li>
                <a href="#!">Link 4</a>
              </li>
            </ul> --}}

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 mb-md-0 mb-3">

            <!-- Links -->
            {{-- <h5 class="text-uppercase">Links</h5>

            <ul class="list-unstyled">
              <li>
                <a href="#!">Link 1</a>
              </li>
              <li>
                <a href="#!">Link 2</a>
              </li>
              <li>
                <a href="#!">Link 3</a>
              </li>
              <li>
                <a href="#!">Link 4</a>
              </li>
            </ul> --}}

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

      </div>
      <!-- Footer Links -->

      <!-- Copyright -->
      <div class="footer-copyright text-center py-3" style="color:white;">© 2020 MTN Sales -  Conference  2020
        {{-- <a href="#"> MDBootstrap.com</a> --}}
      </div>
      <!-- Copyright -->

    </footer>
    <!-- Footer -->
  <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <!-- Scripts -->
    <!-- <script src="{{ asset('js2/jquery.min.js') }}" ></script>
    <script src="{{ asset('js2/popper.min.js') }}" ></script>
  <script src="{{ asset('js2/bootstrap.min.js') }}"></script> -->
  <script src="{{ asset('js/site.js') }}"></script>


        <!-- jQuery 2.1.4 -->
      <!-- <script src="{{ asset('yo/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script> -->
        <!-- Bootstrap 3.3.5 -->
      <!-- <script src="{{ asset('yo/bootstrap/js/bootstrap.min.js') }}"></script> -->
        <!-- FastClick -->
        <script src="{{ asset('yo/plugins/fastclick/fastclick.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('yo/dist/js/app.min.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
      <script src="{{ asset('yo/dist/js/demo.js') }}"></script>
        <!-- FLOT CHARTS -->
        <script src="{{ asset('yo/plugins/flot/jquery.flot.min.js') }}"></script>
        <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
        <script src="{{ asset('yo/plugins/flot/jquery.flot.resize.min.js') }}"></script>
        <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
        <script src="{{ asset('yo/plugins/flot/jquery.flot.pie.min.js') }}"></script>
        <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
        <script src="{{ asset('yo/plugins/flot/jquery.flot.categories.min.js') }}"></script>



    @yield('javascript')
</body>
</html>
