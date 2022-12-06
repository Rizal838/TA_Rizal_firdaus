<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\pelanggancontroller;
use App\Http\Controllers\pembayarancontroller;
use App\Http\Controllers\rutecontroller;
use App\Http\Controllers\maskapaicontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/pelanggan', [pelangganController::class, 'index'])->name('pelanggan.index')->middleware('auth');
Route::get('/pelanggan/add', [pelanggancontroller::class, 'create'])->name('pelanggan.create')->middleware('auth');
Route::post('/pelanggan/store', [pelanggancontroller::class, 'store'])->name('pelanggan.store');
Route::get('/pelanggan/edit/{id}', [pelanggancontroller::class, 'edit'])->name('pelanggan.edit')->middleware('auth');
Route::post('/pelanggan/pdate/{id}', [pelanggancontroller::class, 'update'])->name('pelanggan.update');
Route::post('/pelanggan/delete/{id}', [pelanggancontroller::class, 'delete'])->name('pelanggan.delete');
Route::post('/pelanggan/hide/{id}', [pelanggancontroller::class, 'hide'])->name('pelanggan.hide');
Route::get('/pelanggan/trash', [pelanggancontroller::class, 'trash'])->name('pelanggan.trash')->middleware('auth');
Route::get('/pelanggan/restore/{id}', [pelanggancontroller::class, 'restore'])->name('pelanggan.restore')->middleware('auth');
Route::get('/pelanggan/search', [pelanggancontroller::class, 'search'])->name('pelanggan.search')->middleware('auth');
Route::get('/pelanggan/search/trash', [pelanggancontroller::class, 'search_trash'])->name('pelanggan.search_trash')->middleware('auth');

Route::get('/pembayaran', [pembayarancontroller::class, 'index'])->name('pembayaran.index')->middleware('auth');
Route::get('/pembayaran/add', [pembayarancontroller::class, 'create'])->name('pembayaran.create')->middleware('auth');
Route::post('/pembayaran/store', [pembayarancontroller::class, 'store'])->name('pembayaran.store');
Route::get('/pembayaran/edit/{id}', [pembayarancontroller::class, 'edit'])->name('pembayaran.edit')->middleware('auth');
Route::post('/pembayaran/update/{id}', [pembayarancontroller::class, 'update'])->name('pembayaran.update');
Route::post('/pembayaran/delete/{id}', [pembayarancontroller::class, 'delete'])->name('pembayaran.delete'); 

Route::get('/rute', [rutecontroller::class, 'index'])->name('rute.index')->middleware('auth');
Route::get('/rute/add', [rutecontroller::class, 'create'])->name('rute.create')->middleware('auth');
Route::post('/rute/store', [rutecontroller::class, 'store'])->name('rute.store');
Route::get('/rute/edit/{id}', [rutecontroller::class, 'edit'])->name('rute.edit')->middleware('auth');
Route::post('/rute/update/{id}', [rutecontroller::class, 'update'])->name('rute.update');
Route::post('/rute/delete/{id}', [rutecontroller::class, 'delete'])->name('rute.delete'); 

Route::get('/maskapai', [maskapaicontroller::class, 'index'])->name('maskapai.index')->middleware('auth');
Route::get('/maskapai/add', [maskapaicontroller::class, 'create'])->name('maskapai.create')->middleware('auth');
Route::post('/maskapai/store', [maskapaicontroller::class, 'store'])->name('maskapai.store');
Route::get('/maskapai/edit/{id}', [maskapaicontroller::class, 'edit'])->name('maskapai.edit')->middleware('auth');
Route::post('/maskapai/update/{id}', [maskapaicontroller::class, 'update'])->name('maskapai.update');
Route::post('/maskapai/delete/{id}', [maskapaicontroller::class, 'delete'])->name('maskapai.delete'); 