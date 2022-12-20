<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pemilihan Ketua OSIS/MPR</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Rubik:500" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                /* background-color: #fff; */
                background-image: url("{{ asset('images/coba.jpg') }}");
                background-size: cover;
                color: #636b6f;
                font-family: 'Roboto', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                -webkit-background-size: 100% 100%;
                -moz-background-size: 100% 100%;
                -o-background-size: 100% 100%;
                background-size: 100% 100%;
            }
            .background{
                
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
                color: black;
                font-family: 'Rubik';
                font-size: 84px;
            }

            /* .links > a {
                background-color: #1abc9c;
                border-radius: 8px;
                box-shadow: 0 10px 6px -6px rgba(0, 0, 0, .20);
                color: white;
                padding: 15px 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                margin: 0 3px 0 3px;
                text-decoration: none;
                text-transform: uppercase;
                transition: 0.2s;
            } */

            /* .links > a:hover {
                background-color: #1dcfab;
                box-shadow: 0 10px 16px -6px rgba(0, 0, 0, .30); */
            }

            .a{
                color: #FFF;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            
            <div class="content">

                <div class="row">
                                  @if (Route::has('login'))
                                  <div class="links" style="margin-top:120px;margin-right:580px">
                                      @auth
                                          <a href="{{ url('/home') }}" style="color:white;'">Home</a>
                                      @else
                                          <a class="btn btn-primary" href="{{ route('login') }}" >Login</a>
                                      @endauth
              
                                      <a  class="btn btn-warning" style="color:white;'" href="{{ route('report.index') }}">Hasil Pemilihan</a>
                              @endif
                                </div>
                        </div>
                </div>
                
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
