@extends('backend.masterbackend')
@section('title', 'KADER | CREATE-CHECK UP')


@section('backend')
    <div class="container mt-3">
        <br>
        <h1 id="ftd">Form Pengajuan</h1>
        <br>
        <form action="{{route('storeSurat')}}" method="POST" enctype="multipart/form-data">
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

            {{-- TANGGAL Pengajuan --}}
            <div class="form-group">
                <label for="tanggal_pengajuan"><strong>Tanggal Pengajuan</strong></label>
                <input type="date" class="form-control" name="tanggal_pengajuan" style="width: 180px">
                @error('tanggal_pengajuan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Nama --}}
            <div class="form-group">
                <label for="nama"><strong>Nama Lengkap</strong></label>
                <input type="text" class="form-control" name="nama">
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Tanggal Lahir --}}
            <div class="form-group">
                <label for="tanggal_lahir"><strong>Tanggal Lahir</strong></label>
                <input type="date" class="form-control" name="tanggal_lahir">
                @error('tanggal_lahir')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Jenis Kelamin --}}
            <div class="form-group">
                <label for="jenis_kelamin"><strong>Jenis Kelamin</strong></label>
                <input type="text" class="form-control" name="jenis_kelamin">
                @error('jenis_kelamin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Pekerjaan --}}
            <div class="form-group">
                <label for="pekerjaan"><strong>Pekerjaan</strong></label>
                <input type="text" class="form-control" name="pekerjaan">
                @error('pekerjaan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Agama --}}
            <div class="form-group">
                <label for="agama"><strong>Agama</strong></label>
                <input type="text" class="form-control" name="agama">
                @error('agama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Alamat --}}
            <div class="form-group">
                <label for="alamat"><strong>Alamat</strong></label>
                <input type="text" class="form-control" name="alamat">
                @error('alamat')
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
