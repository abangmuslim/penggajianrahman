<?php

namespace App\Livewire;

use Exception;
use App\Models\Penggajian;
use App\Models\Detilpenggajian;
use Livewire\Component;
use App\Models\Gaji;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Penggajians extends Component
{
    public $total;
    public $penggajian_id;
    public $gaji_id;
    public $qty=1;
    public $uang;
    public $kembali;
    
    public function render()
    {
        $penggajian=Penggajian::select('*')->where('user_id','=',Auth::user()->id)->orderBy('id','desc')->first();

        $this->total=$penggajian->total;
        $this->kembali=$this->uang-$this->total;
        return view('livewire.penggajians')
        ->with("data",$penggajian)
        ->with("datagaji",Gaji::all())
        ->with("datadetilpenggajian",Detilpenggajian::where('penggajian_id','=',$penggajian->id)->get());
    }

    public function store()
    {
        $this->validate([
            
            'gaji_id'=>'required'
        ]);
        $penggajian=Penggajian::select('*')->where('user_id','=',Auth::user()->id)->orderBy('id','desc')->first();
        $this->penggajian_id=$penggajian->id;
        $gaji=Gaji::where('id','=',$this->gaji_id)->get();
        $harga=$gaji[0]->nominal;
        Detilpenggajian::create([
            'penggajian_id'=>$this->penggajian_id,
            'gaji_id'=>$this->gaji_id,
            'qty'=>$this->qty,
            'nominal'=>$harga
        ]);
        
        
        $total=$penggajian->total;
        $total=$total+($harga*$this->qty);
        Penggajian::where('id','=',$this->penggajian_id)->update([
            'total'=>$total
        ]);
        $this->gaji_id=NULL;
        $this->qty=1;

    }

    public function delete($detilpenggajian_id)
    {
        $detilpenggajian=Detilpenggajian::find($detilpenggajian_id);
        $detilpenggajian->delete();

        //update total
        $detilpenggajian=Detilpenggajian::select('*')->where('penggajian_id','=',$this->penggajian_id)->get();
        $total=0;
        foreach($detilpenggajian as $od){
            $total+=$od->qty*$od->nominal;
        }
        
        try{
            Penggajian::where('id','=',$this->penggajian_id)->update([
                'total'=>$total
            ]);
        }catch(Exception $e){
            dd($e);
        }
    }
    
    public function receipt($id)
    {
        $detilpenggajian = Detilpenggajian::select('*')->where('penggajian_id','=', $id)->get();
        //dd ($detilpenggajian);
        
        return Redirect::route('cetakReceipt')->with(['id' => $id]);

    }

}





