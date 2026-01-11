<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;

// Redirect root to login or dashboard
Route::get('/', function () {
    return auth()->check() ? redirect()->route('dashboard') : redirect()->route('login');
});

// Dashboard - hanya untuk authenticated users
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Routes untuk authenticated users (superadmin dan user)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Routes untuk user biasa - blok superadmin
    Route::middleware('can_access_data')->group(function () {
        // Pasien
        Route::resource('pasien', PasienController::class)
            ->middleware('permission:view_pasien');

        // Dokter
        Route::resource('dokter', DokterController::class)
            ->middleware('permission:view_dokter');

        // Obat
        Route::resource('obat', ObatController::class)
            ->middleware('permission:view_obat');

        // Rekam Medis
        Route::resource('rekam-medis', RekamMedisController::class)
            ->middleware('permission:view_rekam_medis');
    });

    // User management - hanya superadmin
    Route::group(['middleware' => 'permission:manage_users'], function () {
        Route::get('users', [AdminUserController::class, 'index'])->name('users.index');
        Route::get('users/create', [AdminUserController::class, 'create'])->name('users.create');
        Route::post('users', [AdminUserController::class, 'store'])->name('users.store');
        Route::get('users/{user}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
        Route::patch('users/{user}', [AdminUserController::class, 'update'])->name('users.update');
        Route::delete('users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
    });

    // Profile management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Auth routes
require __DIR__.'/auth.php';
