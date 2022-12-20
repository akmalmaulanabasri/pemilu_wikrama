@extends('layouts.app')

@section('header')
<div class="jumbotron text-black bg-gradient-warning">
    
    <div class="container py-5">
        <h1 class="display-2 text-white">Pemilihan Calon Ketua OSIS</h1>

        <p class="lead text-white">Periode 2022 - 2023</p>
    </div>
</div>
@endsection

@section('content')
<div class="m-5">
    <div class="row justify-content-center">
        <div class="col-md-12 py-5">
            <h1 class="text-center">Kandidat Ketua OSIS</h1>
        </div>
        
        @isset($candidates)
            @foreach ($candidates as $r) 
                <div class="col-md-4">
                    <div class="card-md-5 mt-3 shadow border-0" style="width: 15=rem;">
                        <img src="{{ asset("images/candidates/$r->image") }}" alt="" class="card-img-top img-fluid">

                        <div class="card-body">
                            <small class="text-warning">{{ $r->nis }}</small>
                            <h4 class="card-title">{{ $r->name }}</h4>
                            <p class="card-subtitle">{{ $r->sex }}</p>
                            <p class="card-subtitle mt-1">Rayon {{ $r->rayon->name }}</p>

                            <div class="" style="width: 15=rem;">
                                <span class="font-weight-bold">Visi</span>
                                <p>{{ $r->visi }}</p>
                            </div>
                            
                            <div class="" style="width: 15=rem;">
                                <span class="font-weight-bold">Misi</span>
                                <p>{{ $r->misi }}</p>
                            </div>
                            <div class="">
                            <a href="{{ route('candidates.show', $r->id)}}" class="btn btn-warning btn-sm">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


            @if (Auth::user()->is_admin == 1)
            @elseif(Auth::user()->is_admin == 2)

            @if (Auth::user()->is_voting)
                <div class="col-md-12 mt-5 text-center">
                    <a href="{{ route('report.index') }}" class="btn btn-warning">Lihat Hasil</a>
                </div>
            @else
                <div class="col-md-12 mt-5 text-center">
                    <a href="{{ route('vote.indexguru') }}" class="btn btn-warning">Tentukan Pilihanmu</a>
                </div>
            @endif

            @else
                @if (Auth::user()->is_voting)
                    <div class="col-md-12 mt-5 text-center">
                        <a href="{{ route('report.index') }}" class="btn btn-warning">Lihat Hasil</a>
                    </div>
                @else
                    <div class="col-md-12 mt-5 text-center">
                        <a href="{{ route('vote.index') }}" class="btn btn-warning">Tentukan Pilihanmu</a>
                    </div>
                @endif
            @endif
        @endisset
    </div>
</div>
@endsection
