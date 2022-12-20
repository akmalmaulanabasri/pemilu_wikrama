@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-center">Data Detail {{$candidate->name}}</h6>
            </div>
            <div class="card-body text-center py-3">
                        <img src="{{ asset("images/candidates/$candidate->image") }}" alt="" class="card-img-top img-fluid" style="width: 300px;">
                 <hr>
                <div class="form-group">      
                    <h3>{{ $candidate->name}}</h3>
                </div>  
                <div class="form-group text-justify">
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $candidate->latar_belakang}}</p>
                </div>    
            </div>
             
            
        </div>
    </div>
@endsection