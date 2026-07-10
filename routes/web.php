<?php

use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\ManagerCutiController;
use App\Http\Controllers\PengajuanCutiController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

    Route::get('/hrd/dashboard', [PengumumanController::class, 'DashboardHrd'])->name('hrd.dashboard');

    Route::get('/hrd/pengumuman', [PengumumanController::class, 'index'])->name('hrd.pengumuman');
    Route::post('/hrd/pengumuman', [PengumumanController::class, 'store'])->name('hrd.pengumuman.store');
    Route::get('/hrd/pengumuman/{pengumuman}/edit', [PengumumanController::class, 'edit'])->name('hrd.pengumuman.edit');
    Route::put('/hrd/pengumuman/{pengumuman}', [PengumumanController::class, 'update'])->name('hrd.pengumuman.update');
    Route::delete('/hrd/pengumuman/{pengumuman}', [PengumumanController::class, 'destroy'])->name('hrd.pengumuman.destroy');

    Route::get('/hrd/departemen', [DepartemenController::class, 'index'])->name('hrd.departemen');
    Route::post('/hrd/departemen', [DepartemenController::class, 'store'])->name('hrd.departemen.store');
    Route::get('/hrd/departemen/{departemen}/edit', [DepartemenController::class, 'edit'])->name('hrd.departemen.edit');
    Route::put('/hrd/departemen/{departemen}', [DepartemenController::class, 'update'])->name('hrd.departemen.update');
    Route::delete('/hrd/departemen/{departemen}', [DepartemenController::class, 'destroy'])->name('hrd.departemen.destroy');

    Route::get('/hrd/user', [UserController::class, 'index'])->name('hrd.user');
    Route::post('/hrd/user', [UserController::class, 'store'])->name('hrd.user.store');
    Route::get('/hrd/user/{user}/edit', [UserController::class, 'edit'])->name('hrd.user.edit');
    Route::put('/hrd/user/{user}', [UserController::class, 'update'])->name('hrd.user.update');
    Route::delete('/hrd/user/{user}', [UserController::class, 'destroy'])->name('hrd.user.destroy');

    Route::get('/hrd/cuti', [PengajuanCutiController::class, 'daftarCutiHRD'])->name('hrd.daftar_cuti');
    Route::put('/hrd/cuti/{cuti}/diterima', [PengajuanCutiController::class, 'diterima'])->name('hrd.cuti.diterima');
    Route::put('/hrd/cuti/{cuti}/ditolak', [PengajuanCutiController::class, 'ditolak'])->name('hrd.cuti.ditolak');

});

// Manager
Route::middleware(['auth', 'role:manager'])->group(function () {

    Route::get('/manager/dashboard', [ManagerCutiController::class, 'dashboard'])->name('manager.dashboard');
    Route::get('/manager/pengumuman', [PengumumanController::class, 'index'])->name('manager.pengumuman');
    Route::post('/manager/pengumuman', [PengumumanController::class, 'store'])->name('manager.pengumuman.store');
    Route::get('/manager/pengumuman/{pengumuman}/edit', [PengumumanController::class, 'edit'])->name('manager.pengumuman.edit');
    Route::put('/manager/pengumuman/{pengumuman}', [PengumumanController::class, 'update'])->name('manager.pengumuman.update');
    Route::delete('/manager/pengumuman/{pengumuman}', [PengumumanController::class, 'destroy'])->name('manager.pengumuman.destroy');

    Route::get('/manager/user', [UserController::class, 'index'])->name('manager.user');
    Route::post('/manager/user', [UserController::class, 'store'])->name('manager.user.store');
    Route::get('/manager/user/{user}/edit', [UserController::class, 'edit'])->name('manager.user.edit');
    Route::put('/manager/user/{user}', [UserController::class, 'update'])->name('manager.user.update');
    Route::delete('/manager/user/{user}', [UserController::class, 'destroy'])->name('manager.user.destroy');

    Route::get('/manager/pengajuan-cuti', [ManagerCutiController::class, 'daftarCuti'])->name('manager.daftar_cuti');
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
