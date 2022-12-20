@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4 mb-5">
            <div class="card shadow-sm border-0">
                <div class="card-header">{{ (Request::is('rayon')) ? 'Daftar Rayon Baru' : 'Sunting Rayon' }}</div>

                <div class="card-body">
                    @if (Request::is('rayon'))
                        @include('rayon.create')
                    @else
                        @include('rayon.edit')
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header">Data Rayon</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="datatables">
                            <thead>
                                <tr>
                                    <th width="1">#</th>
                                    <th width="10">Kode</th>
                                    <th>Nama Rayon</th>
                                    <th width="10"></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach ($rayons as $r)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $r->code }}</td>
                                        <td>{{ $r->name }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('rayon.edit', $r->id) }}" class="btn btn-link btn-sm">Edit</a>

                                                <form action="{{ route('rayon.destroy', $r->id) }}" method="post">
                                                    @csrf

                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-link btn-sm"
                                                        onclick="return confirm('Yakin?')">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection