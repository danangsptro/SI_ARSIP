<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Pengajuan Surat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<style>
    .img-file {
            width: 50px;
            height: 50px;
            cursor: pointer;
        }

</style>

<body>
    <table class="table table-sm">
        <br>
        <h4 class="text-center">Table Pengajuan Surat</h4>
        <br>
        <thead class="thead-light">
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
            </tr>
        </thead>
        <tbody>
            @foreach ($pengajuan as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        {{ $d->jenisPengajuan->nama }}
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
                        @if ($d->file)
                            <img src="{{ Storage::url($d->file) ? asset('assets/img/logodoc.png') : asset('assets/img/logodoc.png') }}"
                                data-toggle="modal" data-target="#exampleModal{{ $loop->iteration }}"
                                alt="Image Not Found" class="img-file">

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
