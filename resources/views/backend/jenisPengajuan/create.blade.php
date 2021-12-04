@extends('backend.masterbackend')
@section('title', 'ARSIP | CREATE-KODE SURAT')


@section('backend')
    <div class="container mt-3">
        <br>
        <h1 id="ftd">Create Kode Surat</h1>
        <br>
        <form action="{{ route('storePengajuan') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label"><strong>No Index</strong></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="no_index">
                    @error('no_index')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label"><strong>Jenis Pengajuan</strong></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama">
                    @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <button class="btn btn-success" type="submit"
                        onclick="return confirm('Anda Yakin Sudah Benar ?')">Save</button>
                    <a href="{{ route('pengajuan') }}" class="btn btn-primary">Back</a>
                </div>
            </div>

        </form>
    </div>
@endsection
