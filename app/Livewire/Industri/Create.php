<?php

namespace App\Livewire\Industri;

use Livewire\Component;
use App\Models\Industri;

class Create extends Component
{
    public $nama;
    public $bidang_usaha;
    public $alamat;
    public $kontak; 
    public $email; 
    public $website;

    public function save()
    {
        $this->validate([
            'nama' => [
                'required',
                'unique:industris,nama',
                function ($attribute, $value, $fail) {
                    $normalizedInput = $this->normalizeNama($value);
                    $industris = Industri::pluck('nama');
                    foreach ($industris as $namaDb) {
                        $normalizedDb = $this->normalizeNama($namaDb);
                        similar_text($normalizedInput, $normalizedDb, $percent);
                        if ($percent > 90) {
                            $fail("Nama industri terlalu mirip dengan \"$namaDb\" ({$percent}% mirip).");
                        }
                    }
                },
            ],
            'bidang_usaha' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'email' => 'required|email',
            'website' => 'required|url',
        ]);

        Industri::create([
            'nama' => $this->nama,
            'bidang_usaha' => $this->bidang_usaha,
            'alamat' => $this->alamat,
            'kontak' => $this->kontak,
            'email' => $this->email,
            'website' => $this->website,
        ]);

        session()->flash('success', 'Industri berhasil ditambahkan.');

        // ✅ Redirect ke halaman index industri (pastikan route ini ada!)
        return redirect()->route('industri');
    }

    private function normalizeNama($nama)
    {
        $nama = strtolower($nama);
        $nama = preg_replace('/\s+/', ' ', $nama); // Hilangkan spasi berlebih
        return trim($nama);
    }

    public function render()
    {
        return view('livewire.industri.create')
            ->layout('layouts.app');
    }
}
