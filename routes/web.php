<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Produk\ProdukController;
use App\Http\Controllers\Bank\BankController;

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
});

Route::resource('/produk/produk', ProdukController::class);

Route::resource('/bank/bank', BankController::class);
