<?php

namespace App\Http\Controllers;
use App\Models\Penggajian;
use App\Models\Detilpenggajian;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CetakController extends Controller
{
    //
    public function receipt():View
    {
        $id=session()->get('id');
        $penggajian=Penggajian::find($id);
        //dd($order)
        $detilpenggajian=Detilpenggajian::where('penggajian_id',$id)->get();
        return view('gajian.receipt')->with([
            'dataPenggajian'=>$penggajian,
            'dataDetilpenggajian'=>$detilpenggajian,
        ]);
    }
}


