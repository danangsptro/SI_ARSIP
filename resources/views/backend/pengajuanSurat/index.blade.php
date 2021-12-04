@extends('backend.masterbackend')
@section('title', 'ARSIP | JENIS PENGAJUAN')


@section('backend')
    <br>
    <br>
    <h1 id="ftd">Table Pengajuan Surat</h1>
    <br>
    <div class="container-fluid">
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Kembali Halaman
            Admin</a>
        @if (Auth::user()->user_role != 'Staff')
            <a href="" class="btn btn-dark">Print Laporan &nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                    <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                    <path
                        d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                </svg>
            </a>
            <a href="{{ route('createSurat') }}" class="btn btn-success">Tambah Data</a>
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
                            <th scope="col">Jenis Surat</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tgl Lahir</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Agama</th>
                            <th scope="col">Pekerjaan</th>
                            <th scope="col">Tgl Masuk</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Perihal</th>
                            <th scope="col">File</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengajuan as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <span class="badge badge-light">{{ $d->jenisPengajuan->nama }}</span>
                                </td>
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
                                        <img src="{{ asset('storage/data/' . $d->file) }}" alt="Image Not Found"
                                            width="80px" height="80px">

                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('editSurat', $d->id) }}" class="btn btn-warning btn-sm"
                                        style="border-radius: 5rem">EDIT</a>
                                    <form action="{{ route('deleteSurat', $d->id) }}" class="d-inline"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('ANDA YAKIN INGIN MENGHAPUS ?')"
                                            style="border-radius: 5rem">HAPUS</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="  https://printjs-4de6.kxcdn.com/print.min.js">

    </script>
@endsection
