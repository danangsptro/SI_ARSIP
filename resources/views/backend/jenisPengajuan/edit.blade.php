@extends('backend.masterbackend')
@section('title', 'ARSIP | EDIT-JENIS PENGAJUAN')


@section('backend')
    <div class="container mt-3">
        <br>
        <h1 id="ftd">Edit Jenis Pengajuan</h1>
        <br>
        <form action="{{ route('updateStore', $pengajuan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <input type="hidden" class="form-control" name="id" value="{{ $pengajuan->id }}">
            <div class="form-group">
                <label for="no_index"><strong>No Index</strong></label>
                <input type="text" class="form-control" name="no_index" value="{{ $pengajuan->no_index }}">
                @error('no_index')
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
            <button class="btn btn-success" type="submit"
                onclick="return confirm('Anda Yakin Sudah Benar ?')">Upload</button>
            <a href="{{ route('pengajuan') }}" class="btn btn-primary">Back</a>
        </form>
        <br>
    </div>
@endsection
