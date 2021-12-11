<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Model\jenis_pengajuan;
use App\Http\Model\pengajuanSurat;
use Illuminate\Http\Request;

class laporanController extends Controller
{
    public function index()
    {
        $laporan = jenis_pengajuan::with('pengajuanSurat')->get();
        return view('backend.laporan.index', compact('laporan'));
    }

    public function show ($id)
    {
        $data = pengajuanSurat::all();
        $laporan = jenis_pengajuan::with('pengajuanSurat')->find($id);
        $pengajuan = $laporan->pengajuanSurat;
        return view('backend.laporan.show', compact('laporan', 'pengajuan', 'data'));
    }

    public function print($id)
    {
        $data = pengajuanSurat::all();
        $pdf = jenis_pengajuan::with('pengajuanSurat')->find($id);
        $result = $pdf->pengajuanSurat;
        return view('backend.laporan.cetak', compact('pdf', 'result', 'data'));
    }

}
