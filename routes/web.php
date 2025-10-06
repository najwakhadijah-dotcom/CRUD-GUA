<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectorController;
use App\Http\Controllers\JadwalPerkuliahanController;


Route::get('/', function () {
    return redirect()->route('user.projectors.index');
});

// Routes untuk user
Route::prefix('user')->name('user.')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('dashboard');

    // Proyektor routes
    Route::get('/projectors', [ProjectorController::class, 'index'])->name('projectors.index');
    Route::get('/projectors/{id}', [ProjectorController::class, 'show'])->name('projectors.show');

    // Riwayat (placeholder)
    Route::get('/riwayat', function () {
        return view('user.riwayat');
    })->name('riwayat');
});

// Route root redirect ke dashboard user
Route::redirect('/', '/user/dashboard');

// Routes untuk manajemen proyektor
Route::resource('projectors', ProjectorController::class);

// Route untuk dashboard admin
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// Route untuk halaman proyektor (alternatif)
Route::get('/admin/proyektor', [ProjectorController::class, 'index'])->name('admin.proyektor');

// Tambahkan INI SEBELUM resource
Route::delete('jadwal-perkuliahan/delete-all', [JadwalPerkuliahanController::class, 'deleteAll'])
    ->name('jadwal-perkuliahan.delete-all');

// Halaman utama jadwal perkuliahan
 Route::resource('jadwal-perkuliahan', JadwalPerkuliahanController::class);

 Route::post('/admin/jadwal-perkuliahan/import', [JadwalPerkuliahanController::class, 'import'])
    ->name('jadwal-perkuliahan.import');

Route::get('/template', [JadwalPerkuliahanController::class, 'downloadTemplate'])->name('template');

Route::post('jadwal-perkuliahan/delete-all', [JadwalPerkuliahanController::class, 'deleteAll'])
    ->name('jadwal-perkuliahan.delete-all');