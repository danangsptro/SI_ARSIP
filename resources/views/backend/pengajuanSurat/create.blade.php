@extends('backend.masterbackend')
@section('title', 'KADER | CREATE-CHECK UP')


@section('backend')
    <div class="container mt-3">
        <br>
        <h1 id="ftd">Form Pengajuan</h1>
        <br>
        <form action="{{ route('storeSurat') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Jenis Surat --}}
            <label for="index_id"><strong>Jenis Surat</strong></label>
            <select name="index_id" id="index_id" class="custom-select">
                <option value="">
                    -- Pilih Jenis Surat --
                </option>
                @foreach ($jenisPengajuan as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
            @error('index_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <br><br>
            <div class="form-group">
                <label for="nama"><strong>nama</strong></label>
                <input type="text" class="form-control" name="nama">
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggal_lahir"><strong>tanggal_lahir</strong></label>
                <input type="date" class="form-control" name="tanggal_lahir" style="width: 180px">
                @error('tanggal_lahir')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jenis_kelamin"><strong>Jenis Kelamin</strong></label>
                <input type="text" class="form-control" name="jenis_kelamin">
                @error('jenis_kelamin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="agama"><strong>agama</strong></label>
                <input type="text" class="form-control" name="agama">
                @error('agama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="pekerjaan"><strong>Pekerjaan</strong></label>
                <input type="text" class="form-control" name="pekerjaan">
                @error('pekerjaan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggal_masuk"><strong>Tanggal Masuk</strong></label>
                <input type="date" class="form-control" name="tanggal_masuk" style="width: 180px">
                @error('tanggal_masuk')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Asal --}}
            <div class="form-group">
                <label for="alamat"><strong>alamat</strong></label>
                <input type="text" class="form-control" name="alamat">
                @error('alamat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Perihal --}}
            <div class="form-group">
                <label for="perihal"><strong>Perihal</strong></label>
                <input type="text" class="form-control" name="perihal">
                @error('perihal')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- fILE --}}
            <div class="form-group">
                <label for="file"><strong>File</strong></label>
                <input type="file" class="form-control" name="file">
                @error('file')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success" type="submit" onclick="return confirm('Anda Yakin Sudah Benar ?')">Save</button>
            <a href="{{ route('pengajuanSurat') }}" class="btn btn-primary">Back</a>
            <br>
            <br>
        </form>
    </div>
@endsection
