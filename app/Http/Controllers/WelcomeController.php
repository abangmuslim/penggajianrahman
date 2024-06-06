<?php

namespace App\Http\Controllers;

use App\Models\Detilpenggajian;
use App\Models\Gaji;
use App\Models\Pegawai;
use App\Models\User;
use App\Models\Penggajian;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome()
    {

        $gaji = Gaji::count();
        $gaji2 = Gaji::count('golongan');
        $pegawai = Pegawai::count();
        $user = User::count();
        $datapenggajian1 = Penggajian::count();

               

        return view('welcome',[
            "pegawai"=> $pegawai,
            "gaji"=> $gaji,
            "gaji2"=> $gaji2,
            "user"=> $user,
            "datapenggajian" => Penggajian::paginate(5),
            "title"=>"welcome"
        ]);
        
    }

    
}


