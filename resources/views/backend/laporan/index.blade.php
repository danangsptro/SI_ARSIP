@extends('backend.masterbackend')
@section('title', 'ARSIP | KODE SURAT')



@section('backend')
    <br>
    <br>
    <h1 id="ftd">Laporan Surat</h1>
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
                            <th scope="col">No index</th>
                            <th scope="col">Jenis Pengajuan</th>
                            <th scope="col">Jumlah Pengajuan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporan as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->no_index }}</td>
                                <td>
                                    <span class="badge badge-light">{{ $d->nama }}</span>
                                </td>
                                <td>
                                    {{ $d->pengajuanSurat->count() }}</td>
                                <td>
                                    <a href="{{ route('laporanShow', $d->id) }}" class="btn btn-info btn-sm">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
