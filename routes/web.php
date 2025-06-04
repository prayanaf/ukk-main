<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Industri;
use App\Models\Pkl;
use App\Models\Siswa;
use App\Livewire\Industri\Index as IndustriIndex;
use App\Livewire\Industri\Create as IndustriCreate;
use App\Livewire\Pkl\Index as PklIndex;
use App\Livewire\Pkl\Create as PklCreate;
use Illuminate\Validation\Rule;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/industri', IndustriIndex::class)->name('industri');
Route::get('/industri.create', IndustriCreate::class)->name('industri.create');
Route::get('/pkl.index', PklIndex::class)->name('pkl.index');
Route::get('/pkl.create', PklCreate::class)->name('pkl.create');

Route::post('/industri', function (Request $request) {
    // Validasi data
    $request->validate([
        'nama' => ['required', 'string', 'max:100', Rule::unique('industris', 'nama')],
        'bidang_usaha' => 'required|string|max:100',
        'alamat' => 'required|string',
        'kontak' => 'required|string|max:20',
        'email' => 'required|email|max:100',
        'website' => 'nullable|url|max:255',
    ]);

    // Simpan data ke database
    $industri = new App\Models\Industri();
    $industri->nama = $request->nama;
    $industri->bidang_usaha = $request->bidang_usaha;
    $industri->alamat = $request->alamat;
    $industri->kontak = $request->kontak;
    $industri->email = $request->email;
    $industri->website = $request->website;
    $industri->save();

    // Redirect ke halaman index industri
    return redirect()->route('industri')->with('success', 'Data industri berhasil disimpan!');
})->name('industri.store');

Route::post('/pkl.index', function (Request $request) {
    // Validasi input
    $request->validate([
        'siswa_id' => 'required|exists:siswas,id',
        'industri_id' => 'required|exists:industris,id',
        'mulai' => 'required|date',
        'selesai' => 'required|date|after:mulai',
    ]);

    // Cek apakah siswa sudah pernah melaporkan PKL
    $sudahAda = Pkl::where('siswa_id', $request->siswa_id)->exists();

    if ($sudahAda) {
        // Kembali ke halaman index dengan pesan error
        return redirect()->route('pkl.index')->with('error', 'Siswa ini sudah pernah melaporkan PKL.');
    }

    // Simpan data PKL
    Pkl::create([
        'siswa_id' => $request->siswa_id,
        'industri_id' => $request->industri_id,
        'mulai' => $request->mulai,
        'selesai' => $request->selesai,
    ]);

    return redirect()->route('pkl.index')->with('success', 'Data industri berhasil disimpan!');
})->name('pkl.store');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'check_user_role',
    'role:Siswa',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});