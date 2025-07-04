<?php

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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');
Route::get('/cektemplate', function () {
    return view('layouts.template');
})->middleware('auth');


Auth::routes();
// tampilan home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// tampilan dashboard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// tampilan kamar
Route::get('/kamar', [App\Http\Controllers\KamarController::class, 'index'])->name('home');
