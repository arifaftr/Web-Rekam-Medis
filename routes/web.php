<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\RekamMedisController;

Route::get('/', function () {
    return view('welcome');
});

// PASIEN
Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');
Route::get('/pasien/create', [PasienController::class, 'create'])->name('pasien.create');
Route::post('/pasien/store', [PasienController::class, 'store'])->name('pasien.store');
Route::get('/pasien/{id}', [PasienController::class, 'show'])->name('pasien.show');
Route::get('/pasien/{id}/edit', [PasienController::class, 'edit'])->name('pasien.edit');
Route::put('/pasien/{id}', [PasienController::class, 'update'])->name('pasien.update');
Route::delete('/pasien/{id}', [PasienController::class, 'destroy'])->name('pasien.destroy');

// OBAT
Route::get('/obat', [ObatController::class, 'index'])->name('obat.index');
Route::get('/obat/create', [ObatController::class, 'create'])->name('obat.create');
Route::post('/obat/store', [ObatController::class, 'store'])->name('obat.store');
Route::get('/obat/{id}', [ObatController::class, 'show'])->name('obat.show');
Route::get('/obat/{id}/edit', [ObatController::class, 'edit'])->name('obat.edit');
Route::put('/obat/{id}', [ObatController::class, 'update'])->name('obat.update');
Route::delete('/obat/{id}', [ObatController::class, 'destroy'])->name('obat.destroy');

// DOKTER
Route::get('/dokter', [DokterController::class, 'index'])->name('dokter.index');
Route::get('/dokter/create', [DokterController::class, 'create'])->name('dokter.create');
Route::post('/dokter/store', [DokterController::class, 'store'])->name('dokter.store');
Route::get('/dokter/{id}', [DokterController::class, 'show'])->name('dokter.show');
Route::get('/dokter/{id}/edit', [DokterController::class, 'edit'])->name('dokter.edit');
Route::put('/dokter/{id}', [DokterController::class, 'update'])->name('dokter.update');
Route::delete('/dokter/{id}', [DokterController::class, 'destroy'])->name('dokter.destroy');

// REKAM MEDIS
Route::get('/rekam-medis', [RekamMedisController::class, 'index'])->name('rekam-medis.index');
Route::get('/rekam-medis/create', [RekamMedisController::class, 'create'])->name('rekam-medis.create');
Route::post('/rekam-medis/store', [RekamMedisController::class, 'store'])->name('rekam-medis.store');
Route::get('/rekam-medis/{id}', [RekamMedisController::class, 'show'])->name('rekam-medis.show');
Route::get('/rekam-medis/{id}/edit', [RekamMedisController::class, 'edit'])->name('rekam-medis.edit');
Route::put('/rekam-medis/{id}', [RekamMedisController::class, 'update'])->name('rekam-medis.update');
Route::delete('/rekam-medis/{id}', [RekamMedisController::class, 'destroy'])->name('rekam-medis.destroy');

