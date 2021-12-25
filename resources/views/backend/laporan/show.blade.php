@extends('backend.masterbackend')
@section('title', 'ARSIP | KODE SURAT')


@section('backend')
    <style>
        .img-file {
            width: 50px;
            height: 50px;
            cursor: pointer;
        }

    </style>
    <br>
    <br>
    <h1 id="ftd">Jenis {{ $laporan->nama }} </h1>
    <br>
    <div class="container-fluid">
        <a href="{{ route('laporan') }}" class="btn btn-primary">Kembali</a>
        <a href="{{ route('laporanPrint', $laporan->id) }}" class="btn btn-dark">Print Laporan &nbsp;<svg
                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer"
                viewBox="0 0 16 16">
                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                <path
                    d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
            </svg>
        </a>
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
                        @foreach ($pengajuan as $d)
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
                                    @if ($d->file)
                                        <img src="{{ Storage::url($d->file) ? asset('assets/img/logodoc.png') : asset('assets/img/logodoc.png') }}"
                                            data-toggle="modal" data-target="#exampleModal{{ $loop->iteration }}"
                                            alt="Image Not Found" class="img-file">

                                    @endif
                                </td>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $loop->iteration }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true" {{ $loop->iteration }}>
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel {{ $loop->iteration }}">
                                                    File Surat</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-right">
                                                    <a href="{{ Storage::url($d->file) }}" download=""
                                                        class="btn btn-dark">
                                                        <i class="fa fa-download"></i></a>
                                                    <br>
                                                    <br>
                                                    {{-- pdf file --}}
                                                    <iframe src="{{ Storage::url($d->file) }}" width="450px"
                                                        height="700px"></iframe>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
