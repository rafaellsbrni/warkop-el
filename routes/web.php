<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Warkop EL
|--------------------------------------------------------------------------
| Semua data di controller masih dummy (hardcoded). Belum ada koneksi
| database / auth sungguhan. Fokus tahap ini murni tampilan (UI/UX).
*/

Route::redirect('/', '/login');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('stok')->name('stok.')->group(function () {
    Route::get('/', [StokController::class, 'index'])->name('index');
    Route::get('/tambah', [StokController::class, 'create'])->name('create');
    Route::get('/stok/{kode?}/edit', [StokController::class, 'edit'])->name('stok.edit');
    // Route::get('/edit', [StokController::class, 'edit'])->name('edit');
});

Route::prefix('transaksi')->name('transaksi.')->group(function () {
    Route::get('/', [TransaksiController::class, 'index'])->name('index');
    Route::get('/input', [TransaksiController::class, 'create'])->name('create');
    Route::get('/detail', [TransaksiController::class, 'detail'])->name('detail');
});

Route::get('/management-user', [UserController::class, 'index'])->name('user.index');

Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
