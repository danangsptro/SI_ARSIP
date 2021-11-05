<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Model\jenis_pengajuan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


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
            toast("Data $pengajuan->nama Success Create Data", 'success');
            return redirect()->route('pengajuan');
        }else{
            toast("Data $pengajuan->nama Error Create Data", 'eror');
            return redirect()->route('pengajuan');

        }
    }

    public function destroy($id)
    {
        $pengajuan = jenis_pengajuan::find($id);
        $pengajuan->delete();

        if ($pengajuan != null) {
            toast("Data $pengajuan->nama Success Delete", 'success');
            return redirect()->route('pengajuan');
        }else{
            toast("Data $pengajuan->nama Error Delete", 'eror');
            return redirect()->route('pengajuan');
        }

    }
}
