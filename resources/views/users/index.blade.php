@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4 mb-5">
            <div class="card shadow-sm border-0">
                <div class="card-header">{{ (Request::is('users')) ? 'Daftar Pemilih Baru' : 'Sunting Pemilih' }}</div>

                <div class="card-body">
                    @if (Request::is('users'))
                        @include('users.create')
                    @else
                        @include('users.edit')
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header">Data Pemilih</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="datatables">
                            <thead>
                                <tr>
                                    <th width="1">#</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>JK</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th width="10"></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach ($users as $r)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $r->nis }}</td>
                                        <td>{{ $r->name }}</td>
                                        <td>{{ $r->sex }}</td>
                                        <td>{{ $r->email }}</td>
                                        <td><span class="text-danger">Password tidak bisa dilihat</span></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('users.edit', $r->id) }}" class="btn btn-link btn-sm">Edit</a>

                                                <form action="{{ route('users.destroy', $r->id) }}" method="post">
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