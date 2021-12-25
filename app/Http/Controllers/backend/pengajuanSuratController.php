<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Model\jenis_pengajuan;
use App\Http\Model\pengajuanSurat;
use Dotenv\Result\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\If_;

class pengajuanSuratController extends Controller
{

    public function pagePdf()
    {
        $pengajuan = pengajuanSurat::all();
        return view('backend.pengajuanSurat.dataPrint', compact('pengajuan'));
    }

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
            'index_id'        => 'required|min:1',
            'nama'            => 'required|min:1',
            'tanggal_lahir'   => 'required|min:1',
            'jenis_kelamin'   => 'required|min:1',
            'agama'           => 'required|min:1',
            'pekerjaan'       => 'required|min:1',
            'tanggal_masuk'   => 'required|min:1',
            'alamat'          => 'required|min:1',
            'perihal'         => 'required|min:1',
            'file'            => 'required|mimes:pdf',
        ]);

        $pengajuan = new pengajuanSurat;
        $pengajuan->index_id = $validate['index_id'];
        $pengajuan->nama = $validate['nama'];
        $pengajuan->tanggal_lahir = $validate['tanggal_lahir'];
        $pengajuan->jenis_kelamin = $validate['jenis_kelamin'];
        $pengajuan->agama = $validate['agama'];
        $pengajuan->pekerjaan = $validate['pekerjaan'];
        $pengajuan->tanggal_masuk = $validate['tanggal_masuk'];
        $pengajuan->alamat = $validate['alamat'];
        $pengajuan->perihal = $validate['perihal'];
        if(!$request->file) {
            $pengajuan->file = $pengajuan->file;
        } else {
            $validasiData['file'] = $request->file('file')->store('asset/file-surat','public');
            $pengajuan->file = $validasiData['file'];
        }
        // dd($pengajuan);
        $pengajuan->save();

        if ($pengajuan) {
            toast("Data $pengajuan->nama Success Create Data", 'success');
            return redirect()->route('pengajuanSurat');
        } else {
            toast("Data $pengajuan->nama Failed Create Data", 'error');
            return redirect()->route('pengajuanSurat');
        }
    }

    public function edit(Request $request)
    {
        $pengajuan = pengajuanSurat::where('id', $request->id)->first();
        $jenisPengajuan = jenis_pengajuan::all();
        return view('backend.pengajuanSurat.edit', compact('pengajuan', 'jenisPengajuan'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'index_id'        => 'required|min:1',
            'nama'            => 'required|min:1',
            'tanggal_lahir'   => 'required|min:1',
            'jenis_kelamin'   => 'required|min:1',
            'agama'           => 'required|min:1',
            'pekerjaan'       => 'required|min:1',
            'tanggal_masuk'   => 'required|min:1',
            'alamat'          => 'required|min:1',
            'perihal'         => 'required|min:1',
            'file'            => 'required|mimes:pdf,string',
        ]);

        $id = $request->id;
        $pengajuan = pengajuanSurat::find($id);

        if(!$id){
            toast("Data $pengajuan->nama Failed Update Data", 'error');
            return redirect()->route('pengajuanSurat');
        } else {
            $pengajuan->index_id = $request->index_id;
            $pengajuan->nama = $request->nama;
            $pengajuan->tanggal_lahir = $request->tanggal_lahir;
            $pengajuan->jenis_kelamin = $request->jenis_kelamin;
            $pengajuan->agama = $request->agama;
            $pengajuan->pekerjaan = $request->pekerjaan;
            $pengajuan->tanggal_masuk = $request->tanggal_masuk;
            $pengajuan->alamat = $request->alamat;
            $pengajuan->perihal = $request->perihal;
            if(!$request->file) {
                $pengajuan->file = $pengajuan->file;
            } else if($request->file) {
                $validasiData['file'] = $request->file('file')->store('asset/file-surat','public');
                $pengajuan->file = $validasiData['file'];
            }else {
                toast("Data $pengajuan->nama Failed Update Data", 'error');
                return redirect()->route('pengajuanSurat');
            }
            $pengajuan->save();
            toast("Data $pengajuan->nama Success Update Data", 'success');
            return redirect()->route('pengajuanSurat');
        }


        // if($request->file == null){
        //     $pengajuan->file = $pengajuan->file;
        // }elseif (Storage::url($pengajuan->file)){
        //     Storage::delete('public/'.$pengajuan->file);
        //     $pengajuan = $request->file('file')->store('asset/file-surat', 'public');
        // }else{
        //     $validate['file'] = $request->file('file')->store('asset/file-surat', 'public');
        //     $pengajuan->file = $validate['file'];
        // }
        // // dd($pengajuan);


        // $pengajuan->save();

        // if($pengajuan != null){
        //     toast("Data $pengajuan->nama Success Update Data", 'success');
        //     return redirect()->route('pengajuanSurat');
        // }else{
        //     toast("Data $pengajuan->nama Failed Update Data", 'error');
        //     return redirect()->route('pengajuanSurat');
        // }
    }

    public function destroy($id)
    {
        $pengajuan = pengajuanSurat::find($id);
        if ($pengajuan->file === null) {
            $pengajuan->delete();
        } else {
            Storage::delete('public/data/' . $pengajuan->file);
            $pengajuan->delete();
        }
        if ($pengajuan) {
            toast("Data $pengajuan->nama Success Delete Data", 'success');
            return redirect()->route('pengajuanSurat');
        } else {
            toast("Data $pengajuan->nama Failed Delete Data", 'error');
            return redirect()->route('pengajuanSurat');
        }
    }
}
