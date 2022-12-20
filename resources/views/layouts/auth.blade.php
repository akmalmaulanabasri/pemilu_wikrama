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

    
    <style>
        body {
           
            background-size: cover;
        }
    </style>
</head>
<body class="bg-gradient-warning">
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

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
