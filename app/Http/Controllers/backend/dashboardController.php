<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Model\jenis_pengajuan;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index ()
    {
        $jenisPengajuan = jenis_pengajuan::all();
        return view('backend.dashboardAdmin', compact('jenisPengajuan'));
    }
}
