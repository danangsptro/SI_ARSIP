<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Model\jenis_pengajuan;
use App\Http\Model\pengajuanSurat;
use Dotenv\Result\Success;
use Illuminate\Http\Request;

class pengajuanSuratController extends Controller
{
    public function index()
    {
        $pengajuan = pengajuanSurat::all();
        return view('backend.pengajuanSurat.index', compact('pengajuan'));
    }

    public function create()
    {
        $jenisPengajuan = jenis_pengajuan::all();
        return view('backend.pengajuanSurat.create', compact('jenisPengajuan'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'index_id'          => 'required|min:1',
            'tanggal_pengajuan' => 'required|min:1',
            'nama'              => 'required|min:1',
            'tanggal_lahir'     => 'required|min:1',
            'jenis_kelamin'     => 'required|min:1',
            'pekerjaan'         => 'required|min:1',
            'agama'             => 'required|min:1',
            'alamat'            => 'required|min:1',
        ]);

        $pengajuan = new pengajuanSurat;
        $pengajuan->index_id = $validate['index_id'];
        $pengajuan->tanggal_pengajuan = $validate['tanggal_pengajuan'];
        $pengajuan->nama = $validate['nama'];
        $pengajuan->tanggal_lahir = $validate['tanggal_lahir'];
        $pengajuan->jenis_kelamin = $validate['jenis_kelamin'];
        $pengajuan->pekerjaan = $validate['pekerjaan'];
        $pengajuan->agama = $validate['agama'];
        $pengajuan->alamat = $validate['alamat'];
        $pengajuan->save();

        if ($pengajuan) {
            toast("Data $pengajuan->nama Success Create Data", 'success');
            return redirect()->route('pengajuanSurat');
        } else {
            toast("Data $pengajuan->nama Failed Create Data", 'error');
            return redirect()->route('pengajuanSurat');
        }
    }

    public function edit($id)
    {
        $pengajuan = pengajuanSurat::find($id);
        $jenisPengajuan = jenis_pengajuan::all();
        return view('backend.pengajuanSurat.edit', compact('pengajuan', 'jenisPengajuan'));
    }

    public function destroy($id)
    {
        $pengajuan = pengajuanSurat::find($id);
        $pengajuan->delete();

        if ($pengajuan) {
            toast("Data $pengajuan->nama Success Delete Data", 'success');
            return redirect()->route('pengajuanSurat');
        } else {
            toast("Data $pengajuan->nama Failed Delete Data", 'error');
            return redirect()->route('pengajuanSurat');
        }
    }

    // public function active(Request $request, $id)
    // {
    //     $id = $request->id;
    //     $active = pengajuanSurat::find($id);
    //     $active->status = 'Active';
    //     $active->save();
    // }
}
