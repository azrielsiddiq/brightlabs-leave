<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Redirect dashboard berdasarkan role
Route::get('/dashboard', function () {

    return match (auth()->user()->role) {
        'hrd' => redirect()->route('hrd.dashboard'),
        'manager' => redirect()->route('manager.dashboard'),
        'karyawan' => redirect()->route('employee.dashboard'),
        default => abort(403),
    };

})->middleware(['auth', 'verified'])->name('dashboard');


// HRD
Route::middleware(['auth', 'role:hrd'])->group(function () {

    Route::view('/hrd/dashboard', 'hrd.dashboard')
        ->name('hrd.dashboard');

});


// Manager
Route::middleware(['auth', 'role:manager'])->group(function () {

    Route::view('/manager/dashboard', 'manager.dashboard')
        ->name('manager.dashboard');

});

// Karyawan
Route::middleware(['auth', 'role:karyawan'])->group(function () {

    Route::view('/employee/dashboard', 'employee.dashboard')
        ->name('employee.dashboard');

});

// Profile
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

require __DIR__.'/auth.php';