<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\Auth\LoginController;


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');

Route::group(['middleware' => 'auth:admin_web'], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::resource('produk', ProdukController::class);

    Route::resource('bank', BankController::class);
    
    Route::resource('transaksi', TransaksiController::class);
    
    Route::post('transaksi/{transaksi}/confirm-payment',[TransaksiController::class, 'confirmPayment'])->name('transaksi.confirmPayment');
    Route::patch('transaksi/{transaksi}/update-delivery',[TransaksiController::class, 'updateDeliveryData'])->name('transaksi.updateDelivery');

});