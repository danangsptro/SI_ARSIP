@extends('backend.masterbackend')
@section('title', 'ARSIP | DATA USER')


@section('backend')
    <br>
    <br>
    <h1 id="ftd">Seluruh Data User</h1>
    <br>
    <div class="container-fluid">
        <a href="{{route('dashboard')}}" class="btn btn-primary">Kembali Halaman
            Admin</a>
        <br><br>

        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Table</strong>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered ftd">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataUser as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
