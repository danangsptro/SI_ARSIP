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
                <label for="tanggal_masuk"><strong>Tanggal Masuk</strong></label>
                <input type="date" class="form-control" name="tanggal_masuk" value="{{ $pengajuan->tanggal_masuk }}">
                @error('tanggal_masuk')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggal_selesai"><strong>Tanggal Selesai</strong></label>
                <input type="date" class="form-control" name="tanggal_selesai" value="{{ $pengajuan->tanggal_selesai }}">
                @error('tanggal_selesai')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="asal"><strong>Asal</strong></label>
                <input type="text" class="form-control" name="asal" value="{{ $pengajuan->asal }}">
                @error('asal')
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
