
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pemilu Raya</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/argon.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">

    <!-- Icons -->
    <link href="{{ asset('vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
    
</head>
<body style="background: #f5f5f5">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-gradient-warning shadow">
            <div class="{{ (Request::is('home') || Request::is('report') || Request::is('vote')) ? 'container' : 'container-fluid' }}">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Pemilihan
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth
                            {{-- Beranda --}}
                            <li class="nav-item">
                                <a href="{{ route('home') }}" class="nav-link">Beranda</a>
                            </li>

                            @if (Auth::user()->is_admin)
                                {{-- Data Master --}}
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Data Master <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        
                                        <a href="{{ route('users.index') }}" class="dropdown-item">Data Pemilih</a>

                                        <a href="{{ route('candidates.index') }}" class="dropdown-item">Data Kandidat</a>
                                    </div>
                                </li>
                            @endif

                            <li class="nav-item">
                                <a href="{{ route('report.index') }}" class="nav-link">Hasil pemilihan</a>
                            </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('header')

            <div class="py-4 mb-5">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/chart.js@2.8.0') }}"></script>

    <script>
        $(document).ready( function() {
            $('#datatables').DataTable({
                "language": {
                    "paginate": {
                        "previous": "<i class='ni ni-bold-left'></i>",
                        "next": "<i class='ni ni-bold-right'></i>"
                    }
                }
            });
        });
    </script>

    <script>
        $(document).on('click',function(){
            $('.collapse').collapse('hide');
        })
    </script>

    @yield('script')

    @if (Session::has('message'))
        <script>
            swal('Berhasil', '{{ Session::get('message') }}', 'success')
        </script>
    @endif

    @if (Session::has('danger'))
        <script>
            swal('Oops', '{{ Session::get('danger') }}', 'error')
        </script>
    @endif
</body>
</html>
