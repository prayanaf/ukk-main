<?php

namespace App\Livewire\Pkl;

use Livewire\Component;
use App\Models\Siswa;
use App\Models\Industri;
use App\Models\Pkl;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    public $mulai;
    public $selesai;
    public $siswa_id;
    public $industri_id;
    public $siswas;
    public $industris;
    public $siswaList, $industriList;
    public function simpan()
    {
        // validasi & simpan data
    }

       public function mount()
    {
        $userEmail = Auth::user()->email;
        $this->siswaList = Siswa::where('email', $userEmail)->get();
        $this->industriList = Industri::all();

        if ($this->siswaList->count() === 1) {
            $this->siswa_id = $this->siswaList->first()->id;
        }
    }


    public function render()
    {
        return view('livewire.pkl.create')
            ->layout('layouts.app'); 
    }
}