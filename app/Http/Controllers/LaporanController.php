<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penggajian;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = Penggajian::count();
        if ($request->filled('q')) {
            $query = $query->where('id', 'LIKE', '%' . $request->q . '%');
        }
        if ($request->filled('tanggal_mulai')) {
            $query = $query->where('created_at', '>=', $request->tanggal_mulai);
        }
        if ($request->filled('tanggal_selesai')) {
            $query = $query->where('created_at', '<=', $request->tanggal_selesai);
        }

    
        $penggajian = Penggajian::All();
        $totalgaji = Penggajian::sum('total');
        $title = "Laporan Gaji";
        
        if ($request->page == 'laporan') {
            return view('laporan.laporan', compact('penggajian', 'totalgaji', 'title'));
        }

        return view('laporan.laporan', compact('penggajian', 'totalgaji', 'title'));
    }
}



