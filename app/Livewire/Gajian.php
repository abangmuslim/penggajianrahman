<?php

namespace App\Livewire;

use App\Models\Pegawai;
use App\Models\Penggajian;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Gajian extends Component
{

    public $pegawai_id;
    public function render()
    {
        return view('livewire.gajian', [
            'data' => Pegawai::orderBy('id', 'desc')->get()
        ]);
    }

    public function store()
    {
        $this->validate([
            'pegawai_id' => 'required'
        ]);

        Penggajian::create([
            'invoice' => $this->invoice(),
            'pegawai_id' => $this->pegawai_id,
            'user_id' => Auth::user()->id,
            'total' => '0'
        ]);
        $this->pegawai_id = NULL;
        return redirect()->to('penggajian');
    }

    public function invoice()
    {
        $penggajian = Penggajian::orderBy('created_at', 'DESC');
        if ($penggajian->count() > 0) {
            $penggajian = $penggajian->first();
            $explode = explode('-', $penggajian->invoice);
            return 'INV-' . $explode[1] + 1;
        }
        return 'INV-1';
    }
}
