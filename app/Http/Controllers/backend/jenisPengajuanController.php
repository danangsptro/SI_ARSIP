<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Model\jenis_pengajuan;
use Illuminate\Http\Request;

class jenisPengajuanController extends Controller
{
    public function index()
    {
        $pengajuan = jenis_pengajuan::all();
        return view('backend.jenisPengajuan.index', compact('pengajuan'));
    }

    public function create()
    {
        return view('backend.jenisPengajuan.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
        ]);
        $pengajuan = jenis_pengajuan::create($request->all());
        $pengajuan->nama = $validate['nama'];
        $pengajuan->save();

        if ($pengajuan) {
            return redirect()->route('pengajuan')->with('success', 'Data berhasil ditambahkan');
        }else{
            return redirect()->route('pengajuan')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function destroy($id)
    {
        $pengajuan = jenis_pengajuan::find($id);
        $pengajuan->delete();

        if ($pengajuan != null) {
            return redirect()->route('pengajuan')->with('success', 'Data berhasil dihapus');
        }else{
            return redirect()->route('pengajuan')->with('error', 'Data gagal dihapus');
        }

    }
}
