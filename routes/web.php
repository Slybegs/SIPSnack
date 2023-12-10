<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Auth\LoginController;
use App\Http\Controllers\Web\Auth\RegisterController;
use App\Http\Controllers\Web\Auth\ProfileController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ProdukController;
use App\Http\Controllers\Web\KeranjangController;
use App\Http\Controllers\Web\TransaksiController;

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


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('produk/{produk}', [ProdukController::class, 'show'])->name('produk.show');

Route::group(['middleware' => 'auth:web'], function () {
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('transaksi/{transaksi}/konfirmasi-pembayaran', [TransaksiController::class, 'confirmPayment'])->name('transaksi.confirmPayment');
    Route::post('transaksi/{transaksi}/konfirmasi-pengiriman', [TransaksiController::class, 'confirmDelivery'])->name('transaksi.confirmDelivery');
    Route::post('transaksi/{transaksi}/batal', [TransaksiController::class, 'cancel'])->name('transaksi.cancel');
    Route::resource('keranjang', KeranjangController::class);
    Route::resource('transaksi', TransaksiController::class);
});