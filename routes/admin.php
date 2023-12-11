<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\SalesReportController;
use App\Http\Controllers\Admin\Auth\LoginController;


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');

Route::group(['middleware' => 'auth:admin_web'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::resource('admin', AdminController::class);
    Route::resource('user', UserController::class);
    Route::resource('produk', ProdukController::class);

    Route::resource('bank', BankController::class);
    
    Route::resource('transaksi', TransaksiController::class);
    
    Route::post('transaksi/{transaksi}/confirm-payment',[TransaksiController::class, 'confirmPayment'])->name('transaksi.confirmPayment');
    Route::patch('transaksi/{transaksi}/update-delivery',[TransaksiController::class, 'updateDeliveryData'])->name('transaksi.updateDelivery');

    Route::get('sales-report', [SalesReportController::class, 'index'])->name('sales-report.index');
    Route::get('sales-report/export', [SalesReportController::class, 'export'])->name('sales-report.export');
    Route::get('sales-report-detail/export', [SalesReportController::class, 'exportDetail'])->name('sales-report-detail.export');
});