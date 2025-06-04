<?php

namespace App\Livewire\Industri;

use Livewire\Component;
use App\Models\Industri;
use Illuminate\Validation\Rule;

class Create extends Component
{
    public $nama;
    public $bidang_usaha;
    public $alamat;

    public function save()
    {
        $this->validate([
            'nama' => [
                'required',
                Rule::unique('industris', 'nama')->message('Nama industri sudah digunakan.')
            ],
            'bidang_usaha' => ['required'],
            'alamat' => ['required'],
        ]);

        Industri::create([
            'nama' => $this->nama,
            'bidang_usaha' => $this->bidang_usaha,
            'alamat' => $this->alamat,
        ]);

        session()->flash('success', 'Industri berhasil ditambahkan.');
        $this->reset(['nama', 'bidang_usaha', 'alamat']);
    }

    public function render()
    {
        return view('livewire.industri.create')
            ->layout('layouts.app');
    }
}
