@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4 mb-5">
            <div class="card shadow-sm border-0">
                <div class="card-header">{{ (Request::is('candidates')) ? 'Daftar Kandidat Baru' : 'Sunting Kandidat' }}</div>

                <div class="card-body">
                    @if (Request::is('candidates'))
                        @if ($candidates->count() < 3)
                            @include('candidates.create')
                        @else
                            {{ "Batas kandidat adalah 3 orang" }}
                        @endif
                    @else
                        @include('candidates.edit')
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header">Data Kandidat</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="datatables">
                            <thead>
                                <tr>
                                    <th width="1">#</th>
                                    <th width="12%">Foto</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>JK</th>
                                    <th>Rayon</th>
                                    <th>Visi</th>
                                    <th>Misi</th>
                                    <th>Latar Belakang</th>
                                    <th width="10"></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach ($candidates as $r)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset("images/candidates/$r->image") }}" alt="{{ $r->name }}" class="img-fluid">
                                        </td>
                                        <td>{{ $r->nis }}</td>
                                        <td>{{ $r->name }}</td>
                                        <td>{{ $r->sex }}</td>
                                        <td>{{ $r->rayon->code }}</td>
                                        <td>{{ $r->visi }}</td>
                                        <td>{{ $r->misi }}</td>
                                        <td>{{ $r->latar_belakang }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('candidates.edit', $r->id) }}" class="btn btn-link btn-sm">Edit</a>

                                                <form action="{{ route('candidates.destroy', $r->id) }}" method="post">
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