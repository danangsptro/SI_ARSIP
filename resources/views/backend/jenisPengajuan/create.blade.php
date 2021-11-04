@extends('backend.masterbackend')
@section('title', 'ARSIP | JENIS PENGAJUAN')


@section('backend')
    <div class="container mt-3">
        <br>
        <h1 id="ftd">Create Jenis Pengajuan</h1>
        <br>
        <form action="{{route('storePengajuan')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama"><strong>Jenis Pengajuan</strong></label>
                <input type="text" class="form-control" name="nama">
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success" type="submit"
                onclick="return confirm('Anda Yakin Sudah Benar ?')">Save</button>
            <a href="{{ route('pengajuan') }}" class="btn btn-primary">Back</a>
        </form>
    </div>
@endsection
