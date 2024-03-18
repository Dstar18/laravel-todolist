<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produk', [\App\Http\Controllers\ProdukController::class, 'gets']);
Route::get('/produk/detail/{idProduk}', [\App\Http\Controllers\ProdukController::class, 'get']);
Route::get('/produk/insert', [\App\Http\Controllers\ProdukController::class, 'insert']);
Route::get('/produk/update/{idProduk}', [\App\Http\Controllers\ProdukController::class, 'update']);
Route::get('/produk/delete/{idProduk}', [\App\Http\Controllers\ProdukController::class, 'delete']);
