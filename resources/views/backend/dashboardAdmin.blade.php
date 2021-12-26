@extends('backend.masterbackend')
@section('title', 'Admin | Daboard Admin')

@section('backend')

    <style>
        .jumbotron-fluid{
            border: 5px solid salmon;
        }
    </style>
    <div class="container-fluid">
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><strong>SKRIPSI</strong></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @if (Auth::user()->user_role === 'kaur_umum')
            <marquee behavior="" direction="" style="color: Green; font-family:Cambria;">
                <h3><i><strong>WELCOME TO DASHBOARD KAUR UMUM</strong></i></h3>
            </marquee>
        @else
            @if (Auth::user()->user_role === 'kaur_pelayanan')
                <marquee behavior="" direction="" style="color: red; font-family:Cambria;">
                    <h3><i><strong>WELCOME TO DASHBOARD KAUR PELAYANAN</strong></i></h3>
                </marquee>
            @else
                @if (Auth::user()->user_role === 'sekdes')
                    <marquee behavior="" direction="" style="color: Navy; font-family:Cambria;">
                        <h3><i><strong>WELCOME TO DASHBOARD SEKDES</strong></i></h3>
                    </marquee>
                @endif
            @endif
        @endif
        <div class="row">
            {{-- <div class="col-lg-4" style="padding: 3rem; background:indianred;">
                <img src="{{ asset('assets/img/Lambang-Kabupaten-Tangerang.png') }}" width="200px" alt="">
            </div> --}}
            <div class="col-lg-4">
                <div class="content mt-1">
                    <div class="jumbotron jumbotron-fluid" style="background-color: rgb(255, 255, 255); border-radius:1rem">
                        <div class="container-fluid" style=" text-align: center">
                            <img src="{{ asset('assets/img/Lambang-Kabupaten-Tangerang.png') }}" width="130px" alt="">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="content mt-1">
                    <div class="jumbotron jumbotron-fluid" style="background-color: white; border-radius:1rem">
                        <div class="container" style=" text-align: center; color:black;">
                            <h1 class="display-4" style="font-size: 50px"><strong>Selamat Datang</strong></h1>
                            <br>
                            <h1 class="display-4" style="font-size: 30px">Kantor</h1>
                            <h1 class="display-4" style="font-size: 30px">Kepala Desa Karet</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <div class="social-box linkedin">
                    <i class="fa fa-barcode"></i>
                    <ul>
                        <li>
                            <span>Kode Surat</span>
                        </li>
                        <li>
                            <span class="count" style="color: red">{{ $jenisPengajuan->count() }}</span>
                            <span>Total</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <div class="social-box facebook">
                    <i class="fa fa-book"></i>
                    <ul>
                        <li>
                            <span>Arsip Surat</span>
                        </li>
                        <li>
                            <span class="count" style="color: red">{{ $pengajuan->count() }}</span>
                            <span>Total</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
