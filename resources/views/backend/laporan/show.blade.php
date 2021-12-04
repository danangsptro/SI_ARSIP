@extends('backend.masterbackend')
@section('title', 'ARSIP | KODE SURAT')


@section('backend')
    <br>
    <br>
    <h1 id="ftd">Jenis {{$laporan->nama}} </h1>
    <br>
    <div class="container-fluid">
        <a href="{{route('laporan')}}" class="btn btn-primary">Kembali</a>
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
                            <th scope="col">Nama</th>
                            <th scope="col">Tgl Lahir</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Agama</th>
                            <th scope="col">Pekerjaan</th>
                            <th scope="col">Tgl Masuk</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Perihal</th>
                            <th scope="col">File</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->nama }}</td>
                                <td>{{ $d->tanggal_lahir }}</td>
                                <td>{{ $d->jenis_kelamin }}</td>
                                <td>{{ $d->agama }}</td>
                                <td>{{ $d->pekerjaan }}</td>
                                <td>{{ $d->tanggal_masuk }}</td>
                                <td>{{ $d->alamat }}</td>
                                <td>{{ $d->perihal }}</td>
                                <td>
                                    @if (!$d->file)
                                        <span class="badge badge-danger">Tidak Ada File</span>
                                    @else
                                    <img src="{{ asset('storage/data/'.$d->file) }}" alt="Image Not Found" width="80px" height="80px">

                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
