<!DOCTYPE html>
<html>

<head>
    <title>Laporan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }

    </style>
    <p class="text-center font-weight-bold">Jenis Laporan {{ $laporan->nama }}</p>


    <table class='table table-bordered'>
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
            </tr>
        </thead>
        <tbody>
            @forelse ($pengajuan as $d)
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
                </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </body>

    </html>
