<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenjualanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


//Search
Route::get('/search/barang', [BarangController::class, 'search']);

// Barang
Route::get('/barang', [BarangController::class, 'index'])->name('barang');
Route::get('/barang/create', [BarangController::class, 'create'])->name('create-barang');
Route::post('/barang/create', [BarangController::class, 'store'])->name('store-barang');
Route::get('/barang/edit/{barang}', [BarangController::class, 'edit'])->name('edit-barang');
Route::post('/barang/edit/{barang}', [BarangController::class, 'update'])->name('update-barang');
Route::get('/barang/delete/{barang}', [BarangController::class, 'delete'])->name('delete-barang');


// Penjualan
Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan');
Route::get('/penjualan/create', [PenjualanController::class, 'create'])->name('create-penjualan');
Route::post('/penjualan/create', [PenjualanController::class, 'store'])->name('store-penjualan');
// Route::get('/barang/edit/{barang}', [PenjualanController::class, 'edit'])->name('edit-barang');
// Route::post('/barang/edit/{barang}', [PenjualanController::class, 'update'])->name('update-barang');
// Route::get('/barang/delete/{barang}', [PenjualanController::class, 'delete'])->name('delete-barang');

