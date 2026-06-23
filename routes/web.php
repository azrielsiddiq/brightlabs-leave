<?php

use App\Http\Controllers\PengajuanCutiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//Route test tampilan blade
Route::view('/test', 'manager.status_cuti')->name('manager.status_cuti');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    return match (Auth::user()->role) {
        'hrd' => redirect()->route('hrd.dashboard'),
        'manager' => redirect()->route('manager.dashboard'),
        'karyawan' => redirect()->route('employee.dashboard'),
        default => abort(403),
    };

})->middleware(['auth', 'verified'])->name('dashboard');

// HRD
Route::middleware(['auth', 'role:hrd'])->group(function () {

    Route::view('/hrd/dashboard', 'hrd.dashboard')->name('hrd.dashboard');

});

// Manager
Route::middleware(['auth', 'role:manager'])->group(function () {

    Route::view('/manager/dashboard', 'manager.dashboard')->name('manager.dashboard');

});

// Karyawan
Route::middleware(['auth', 'role:karyawan'])->group(function () {

    Route::get('/employee/dashboard', [PengajuanCutiController::class, 'dashboard'])->name('employee.dashboard');
    Route::get('/employee/cuti/create', [PengajuanCutiController::class, 'create'])->name('cuti.create');
    Route::post('/employee/cuti/store', [PengajuanCutiController::class, 'store'])->name('cuti.store');
    Route::get('/employee/cuti/riwayat', [PengajuanCutiController::class, 'riwayat'])->name('riwayat.cuti');
    Route::get('/cuti/{id}/edit', [PengajuanCutiController::class, 'edit'])->name('cuti.edit');
    Route::put('/cuti/{id}', [PengajuanCutiController::class, 'update'])->name('cuti.update');
    Route::delete('/cuti/{id}', [PengajuanCutiController::class, 'destroy'])->name('cuti.destroy');
});

// Profile
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';


