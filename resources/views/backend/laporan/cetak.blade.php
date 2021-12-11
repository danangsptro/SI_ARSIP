<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Laporan Surat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
    <table class="table table-sm">
        <br>
        <h4 class="text-center">Jenis {{ $pdf->nama }}</h4>
        <br>
        <thead class="thead-light">
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
            @foreach ($result as $d)
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
                            <img src="{{ asset('storage/data/' . $d->file) }}" alt="Image Not Found" width="80px"
                                height="80px">

                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

<script>
    window.print();
</script>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
