<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Model\jenis_pengajuan;
use App\Http\Model\pengajuanSurat;
use App\User;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index ()
    {
        $jenisPengajuan = jenis_pengajuan::all();
        $pengajuan = pengajuanSurat::all();
        return view('backend.dashboardAdmin', compact('jenisPengajuan', 'pengajuan'));
    }

    public function dataUser ()
    {
        $dataUser = User::all();
        return view('backend.dataUser.index', compact('dataUser'));
    }
}
