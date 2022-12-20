@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8 py-5">
            <h1 class="text-center">Pilih Kandidat Ketua OSIS</h1>
           <h1 class="text-center"><b>KLIK FOTO ATAU NAMA</b></h1>
            <div class="text-center mt-5">
                <form action="{{ route('vote.store') }}" method="post">
                    @csrf
    
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    
                    <div class="row justify-content-center">
                        @foreach ($candidates as $r)
                            <div class="col-md-4">
                                <label style="cursor: pointer">
                                    {{-- <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="candidate_id" id="candidate_id" value="{{ $r->id }}" required>
                                    </div> --}}
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="candidate_id" id="candidate_id" value="{{ $r->id }}" readonly>
                                        <label class="custom-control-label" for="candidate_id">{{ $loop->iteration }} <br></label>
                                    </div>

                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <img src="{{ asset("images/candidates/$r->image") }}" alt="{{ $r->name }}" class="img-fluid w-50">
                                        </li>
                                        <li class="list-group-item"><h5>{{ $r->name }}</h5></li>
                                    </ul>
                                </label>
                            </div>
                        @endforeach
                        
                        <div class="col-md-12 mt-5">
                            <button type="submit" class="btn btn-warning w-25">Pilih</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection