@extends('backend.masterbackend')
@section('title', 'ARSIP | JENIS PENGAJUAN')


@section('backend')
    <br>
    <br>
    <h1 id="ftd">Table Pengajuan Surat</h1>
    <br>
    <div class="container-fluid">
        <a href="{{route('dashboard')}}" class="btn btn-primary" style="border-radius: 5rem">Kembali Halaman
            Admin</a>
        @if (Auth::user()->user_role === 'Masyarakat')
            <a href="{{ route('createSurat') }}" class="btn btn-warning" style="border-radius: 5rem">Tambah Data</a>
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
                            <th scope="col">Status</th>
                            <th scope="col">Jenis Surat</th>
                            <th scope="col">Tanggal Pengajuan</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Pekerjaan</th>
                            <th scope="col">Agama</th>
                            <th scope="col">Alamat</th>
                            @if (Auth::user()->user_role != 'Lurah')
                                <th scope="col">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengajuan as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($d->status_surat == 'Belum Disetujui')
                                        <span class="badge badge-pill badge-danger">{{ $d->status_surat }}</span>
                                    @else
                                        <span class="badge badge-pill badge-success">{{ $d->status_surat }}</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge badge-light">{{ $d->jenisPengajuan->nama }}</span>
                                </td>
                                <td>{{ $d->tanggal_pengajuan }}</td>
                                <td>{{ $d->nama }}</td>
                                <td>{{ $d->tanggal_lahir }}</td>
                                <td>{{ $d->jenis_kelamin }}</td>
                                <td>{{ $d->pekerjaan }}</td>
                                <td>{{ $d->agama }}</td>
                                <td>{{ $d->alamat }}</td>
                                @if (Auth::user()->user_role === 'Masyarakat')
                                    <td>
                                        @if ($d->status_surat != 'Setujui')
                                            <a href="{{ route('editSurat', $d->id) }}" class="btn btn-warning"
                                                style="border-radius: 5rem">EDIT</a>
                                            <form action="{{ route('deleteSurat', $d->id) }}" class="d-inline"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger"
                                                    onclick="return confirm('ANDA YAKIN INGIN MENGHAPUS ?')"
                                                    style="border-radius: 5rem">HAPUS</button>
                                            </form>
                                        @else
                                            @if (Auth::user()->user_role === 'Staff')
                                                <td>
                                                    <select class="form-control">
                                                        <option>Belum Disetujui</option>
                                                        <option>Belum Disetujui</option>
                                                    </select>
                                                </td>
                                            @endif
                                            <span class="badge badge-pill badge-success">Surat sudah di approve!</span>
                                        @endif
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
