@extends('backend.masterbackend')
@section('title', 'ARSIP | KODE SURAT')


@section('backend')
    <br>
    <br>
    <h1 id="ftd">Table Data Kode Surat</h1>
    <br>
    <div class="container-fluid">
        @if (Auth::user()->user_role != 'sekdes')
            <a href="{{ route('createPengajuan') }}" class="btn btn-warning">Tambah Data</a>
        @endif
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
                            <th scope="col">No index</th>
                            <th scope="col">Jenis Pengajuan</th>
                            @if (Auth::user()->user_role != 'sekdes')
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
                                @if (Auth::user()->user_role != 'sekdes')
                                    <td>
                                        <a href="{{ route('editPengajuan', $d->id) }}" class="btn btn-warning btn-sm"
                                            style="border-radius: 5rem">EDIT</a>
                                        <form action="{{route('deletePengajuan', $d->id)}}" class="d-inline" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm"
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
