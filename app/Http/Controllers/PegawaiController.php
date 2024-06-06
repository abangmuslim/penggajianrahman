<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PegawaiController extends Controller
{
    //
    public function index()
    {
        return view('pegawai.tabel',[
            "title"=>"Pegawai",
            "data"=>Pegawai::all()
        ]);
    }

    public function create():View
    {
        return view('pegawai.tambah')->with(["title" => "Tambah Data Pegawai"]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "name"=>"required",
            "hp"=>"required",
            "alamat"=>"nullable",
        ]);

        Pegawai::create($request->all());
        return redirect()->route('pegawai.index')->with('success','Data Pelanggan Berhasil Ditambahkan');
    }

    
    public function edit(Pegawai $pegawai):View
    {
        return view('pegawai.edit',compact('pegawai'))->with(["title" => "Ubah Data Pegawai"]);
    }

    public function update(Request $request, Pegawai $pegawai): RedirectResponse
    {
        $request->validate([
            "name"=>"required",
            "hp"=>"required",
            "alamat"=>"nullable",
        ]);

        $pegawai->update($request->all());
        return redirect()->route('pegawai.index')->with('updated','Data Pelanggan Berhasil Ditambahkan');
    }

    public function show(Pegawai $pegawai):View
    {
        return view('pegawai.tampil',compact('pegawai'))->with(["title" => "Data Pegawai"]);
    }
}
