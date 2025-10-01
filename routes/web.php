<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectorController;
use App\Http\Controllers\PeminjamanController;

Route::get('/', function () {
    return redirect()->route('peminjaman.index');
});

Route::prefix('peminjaman')->name('peminjaman.')->group(function () {
    Route::get('/', [PeminjamanController::class, 'index'])->name('index');
    Route::get('/create', [PeminjamanController::class, 'create'])->name('create');
    Route::post('/store', [PeminjamanController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [PeminjamanController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [PeminjamanController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [PeminjamanController::class, 'destroy'])->name('delete');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::put('/peminjaman/{id}/approve', [AdminController::class, 'approve'])->name('peminjaman.approve');
    Route::put('/peminjaman/{id}/reject', [AdminController::class, 'reject'])->name('peminjaman.reject');
});

// Routes untuk manajemen proyektor
Route::resource('projectors', ProjectorController::class);

// Route untuk dashboard admin
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// Route untuk halaman proyektor (alternatif)
Route::get('/admin/proyektor', [ProjectorController::class, 'index'])->name('admin.proyektor');