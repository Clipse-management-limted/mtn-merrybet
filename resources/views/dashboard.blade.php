<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Wristbands.NG</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css2/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css2/font-awesome.min.css') }}">
            {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
            <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <!-- Fonts -->


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                  Wristbands.NG
                </div>

                <div class="links">
                  <div class="row">
                    <div class="col-sm-12">
                      <button type="button" class="btn btn-danger btn-lg"><a href="{{ url('Temail') }}">E-Ticket</a></button>
                      <button type="button" class="btn btn-secondary btn-lg"><a href="{{ url('validate') }}">Accreditation</a></button>
                  <button type="button" class="btn btn-secondary btn-lg"><a href="{{ url('Raffle') }}">Raffle</a></button>
                    </div>
                  </div>

                  <div class="row">
                    <div class=" col-sm-12">

                  <button type="button" class="btn btn-secondary btn-lg"><a href="{{ url('cregister') }}">Register</a></button>
                  <button type="button" class="btn btn-primary btn-lg"><a href="{{ url('vendor') }}">Vendor</a></button>
                  <button type="button" class="btn btn-danger btn-lg"><a href="{{ url('topup') }}">Top - Up</a></button>
                </div>
              </div>

              <div class="row">
                <div class=" col-sm-12">

              <button type="button" class="btn btn-secondary btn-lg"><a href="{{ url('attend') }}">Attendance</a></button>
              {{-- <button type="button" class="btn btn-primary btn-lg"><a href="{{ url('vendor') }}">Vendor</a></button>
              <button type="button" class="btn btn-danger btn-lg"><a href="{{ url('topup') }}">Top - Up</a></button> --}}
            </div>
          </div>
                </div>
            </div>
        </div>
    </body>
</html>
