<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gaji;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class GajiController extends Controller
{
    //
    public function index()
    {
        $gaji=Gaji::all();
        return view('gaji.index',[
            "title"=>"Gaji",
            "data"=>$gaji
        ]);
    }

    public function create():View
    {
        return view('gaji.create')->with([
            "title" => "Tambah Data Gaji",
        ]);
    }

    public function store(Request $request):RedirectResponse
    {
        $request->validate([
        "name" =>"required",
        "golongan" =>"required",
        "jabatan" =>"required",
        "nominal" =>"required",
        ]);

        Gaji::create($request->all());
        return redirect()->route('gaji.index')->with('success','Gaji Berhasil Ditambahkan');
    }

    public function edit(Gaji $gaji):View
    {
        return view('gaji.edit',compact('gaji'))->with([
            "title"=>"Ubah Data Gaji"
        ]);
    }

    public function update(Gaji $gaji, Request $request):RedirectResponse
    {
        $request->validate([
            "name" =>"required",
            "golongan" =>"required",
            "jabatan" =>"required",
            "nominal" =>"required",
            ]);
    
            $gaji->update($request->all());
            return redirect()->route('gaji.index')->with('updated','Gaji Berhasil Diubah');
    }

    public function show():View
    {
        $gaji=Gaji::all();
        return view('gaji.show')->with([
            "title"=>"Tampilkan Data Gaji",
            "data"=>$gaji
        ]);
    }

    public function destroy($id):RedirectResponse
    {
        Gaji::where('id',$id)->delete();
        return redirect()->route('gaji.index')->with('deleted','Data Gaji Berhasi Dihapus');
         
    }
}
