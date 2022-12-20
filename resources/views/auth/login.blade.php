@extends('layouts.auth')

@section('content')
<!-- <body class="bg-gradient-warning">
    

<div class="container ">
    <div class="text-center bg-white">
        <div class="card-body">
        <h1>Pemilu Telah Usai</h1>
        <p>Hasil akan diumumkan segera</p>
        </div>
    </div>
</div>
</body> -->

<body>
    

<div class="container">

    <div class="row h-100vh align-items-center justify-content-center">
        <div class="col-md-4 mb-lg">
            
            <div class="card shadow bg-white" >
                <div class="card-body">
                    <h3 class="card-title text-center text-dark"><b>Pemilu Raya SMK Wikrama Bogor</b></h3>
                    <form method="POST" action="{{ route('login') }}">
                        
                        @csrf

                        <div class="form-group py-1 border border-warning">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <div class="input-group-text "><i class="ni ni-email-83"></i></div>
                                </div>

                                <input id="login" type="text" class="form-control form-control-alternative  @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" placeholder="Masukan NIS" required autocomplete="off" autofocus>
    
                                @error('login')
                                    <span class="invalid-feedback text-light" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group py-1  border border-warning">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="ni ni-key-25"></i></div>
                                </div>

                                <input id="password" type="password" class="form-control form-control-alternative @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
    
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group py-1">
                            <button type="submit" class="btn btn-warning btn-block border border-warning">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
