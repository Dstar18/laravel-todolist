<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/testhelper', [ProdukController::class, 'testhelper']);
Route::get('/getseloquent', [ProdukController::class, 'getseloquent']);


Route::get('/', [ProdukController::class, 'gets']);
Route::get('/produk/detail/{idProduk}', [ProdukController::class, 'getID']);

Route::match(['get','post'],'/produk/insert', [ProdukController::class, 'insert']);
Route::match(['get','post'],'/produk/update/{id}', [ProdukController::class, 'update']);

Route::get('/produk/delete/{idProduk}', [ProdukController::class, 'delete']);
