@extends('backend.masterbackend')
@section('title', 'ARSIP | JENIS PENGAJUAN')


@section('backend')
    <br>
    <br>
    <h1 id="ftd">Table Data Jenis Pengajuan</h1>
    <br>
    <div class="container-fluid">
        <a href="" class="btn btn-primary" style="border-radius: 5rem">Kembali Halaman
            Admin</a>
        @if (Auth::user()->user_role != 'Lurah')
            <a href="{{ route('createPengajuan') }}" class="btn btn-warning" style="border-radius: 5rem">Tambah Data</a>
        @endif
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
                            <th scope="col">No index</th>
                            <th scope="col">Jenis Pengajuan</th>
                            @if (Auth::user()->user_role != 'Lurah')
                                <th scope="col">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengajuan as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->no_index }}</td>
                                <td>{{ $d->nama }}</td>
                                @if (Auth::user()->user_role != 'Lurah')
                                    <td>
                                        <a href="{{ route('editPengajuan', $d->id) }}" class="btn btn-warning"
                                            style="border-radius: 5rem">EDIT</a>
                                        <form action="{{route('deletePengajuan', $d->id)}}" class="d-inline" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger"
                                                onclick="return confirm('ANDA YAKIN INGIN MENGHAPUS ?')"
                                                style="border-radius: 5rem">HAPUS</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
