@extends('backend.masterbackend')
@section('title', 'ARSIP | EDIT-PENGAJUAN ARSIP')


@section('backend')
    <div class="container mt-3">
        <br>
        <h1 id="ftd">Edit Pengajuan Arsip</h1>
        <br>
        <form action="{{ route('updateSurat', $pengajuan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <input type="hidden" class="form-control" name="id" value="{{ $pengajuan->id }}">
            {{-- Jenis Surat --}}
            <div class="form-group">
                <label for="index_id"><strong>Jenis Surat</strong></label>
                <select name="index_id" id="index_id" class="custom-select">
                    @foreach ($jenisPengajuan as $ds)
                        <option value="{{ $ds->id }}"
                            {{ old('index_id') ?? $pengajuan->index_id == $ds->id ? 'selected' : '' }}>
                            {{ $ds->nama }}
                        </option>
                    @endforeach
                </select>
                @error('index_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama"><strong>Nama</strong></label>
                <input type="text" class="form-control" name="nama" value="{{ $pengajuan->nama }}">
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggal_lahir"><strong>Tanggal Lahir</strong></label>
                <input type="date" class="form-control" name="tanggal_lahir" value="{{ $pengajuan->tanggal_lahir }}">
                @error('tanggal_lahir')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jenis_kelamin"><strong>Jenis Kelamin</strong></label>
                <input type="text" class="form-control" name="jenis_kelamin" value="{{ $pengajuan->jenis_kelamin }}">
                @error('jenis_kelamin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="agama"><strong>Agama</strong></label>
                <input type="text" class="form-control" name="agama" value="{{ $pengajuan->agama }}">
                @error('agama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="pekerjaan"><strong>Pekerjaan</strong></label>
                <input type="text" class="form-control" name="pekerjaan" value="{{ $pengajuan->pekerjaan }}">
                @error('pekerjaan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggal_masuk"><strong>Tanggal Masuk</strong></label>
                <input type="date" class="form-control" name="tanggal_masuk" value="{{ $pengajuan->tanggal_masuk }}">
                @error('tanggal_masuk')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="alamat"><strong>Alamat</strong></label>
                <input type="text" class="form-control" name="alamat" value="{{ $pengajuan->alamat }}">
                @error('alamat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="perihal"><strong>perihal</strong></label>
                <input type="text" class="form-control" name="perihal" value="{{ $pengajuan->perihal }}">
                @error('perihal')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="file"><strong>file</strong></label><br>
                @if (!$pengajuan->file)
                    <span>img not found</span>
                @else
                    <img src="{{ asset('storage/data/'.$pengajuan->file) }}" alt="Image Not Found" width="80px" height="80px">

                @endif
                <br><br>
                <label for="logo_desa">Masukan File</label>
                <div class="input-group">
                    <input type="file" class="form-control @error('file') is-invalid @enderror" id="foto" name="file"
                        value="{{ $pengajuan->file }}">
                </div>
                @error('foto')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success" type="submit"
                onclick="return confirm('Anda Yakin Sudah Benar ?')">Upload</button>
            <a href="{{ route('pengajuanSurat') }}" class="btn btn-primary">Back</a>
        </form>
        <br>
    </div>
@endsection
