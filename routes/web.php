<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;

// Redirect dari root (/) ke /pasien
Route::get('/', function () {
    return redirect()->route('pasien.index');
});

// Rute untuk CRUD data pasien
Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');
Route::post('/pasien/save', [PasienController::class, 'save'])->name('pasien.save');
Route::delete('/pasien/{id_pasien}', [PasienController::class, 'destroy'])->name('pasien.destroy');
