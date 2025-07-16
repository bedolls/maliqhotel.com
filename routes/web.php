<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kamarController;
use App\Http\Controllers\pelangganController;
use App\Http\Controllers\karyawanController;
use App\Http\Controllers\pemesananController;

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

Route::get('/', function () {
    return view('layouts.template');
})->middleware('auth');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Route::get('/cektemplate', function () {
//     return view('layouts.template');
// })->middleware('auth');


Auth::routes();
// tampilan home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// tampilan kamar
Route::get('/kamar', [KamarController::class, 'index'])->name('kamar.index');
Route::post('/kamar', [KamarController::class, 'store'])->name('kamar.store');
Route::get('/kamar/create', [KamarController::class, 'create'])->name('kamar.create');
Route::get('/kamar/{id}/edit', [KamarController::class, 'edit'])->name('kamar.edit');
Route::delete('/kamar/{id}', [KamarController::class, 'destroy'])->name('kamar.destroy');
Route::put('/kamar/{id}', [KamarController::class, 'update'])->name('kamar.update');

// tampilan pelanggan
Route::get('/pelanggan', [pelangganController::class, 'index'])->name('pelanggan.index');
Route::get('/pelanggan/create', [pelangganController::class, 'create'])->name('pelanggan.create');
Route::post('/pelanggan', [pelangganController::class, 'store'])->name('pelanggan.store');
Route::get('/pelanggan/{pelanggan}/edit', [pelangganController::class, 'edit'])->name('pelanggan.edit');
Route::put('/pelanggan/{pelanggan}', [pelangganController::class, 'update'])->name('pelanggan.update');
Route::delete('/pelanggan/{pelanggan}', [pelangganController::class, 'destroy'])->name('pelanggan.destroy');

// tampilan karyawan
Route::get('/karyawan', [karyawanController::class, 'index'])->name('karyawan.index');
Route::get('/karyawan/create', [karyawanController::class, 'create'])->name('karyawan.create');
Route::post('/karyawan', [karyawanController::class, 'store'])->name('karyawan.store');
Route::get('/karyawan/{karyawan}/edit', [karyawanController::class, 'edit'])->name('karyawan.edit');
Route::put('/karyawan/{karyawan}', [karyawanController::class, 'update'])->name('karyawan.update');
Route::delete('/karyawan/{karyawan}', [karyawanController::class, 'destroy'])->name('karyawan.destroy');

// tampilan pemesanan
Route::resource('pemesanan', pemesananController::class);






