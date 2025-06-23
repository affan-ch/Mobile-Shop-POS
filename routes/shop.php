<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shop\LoginController;
use App\Http\Controllers\Shop\DashboardController;
use App\Http\Controllers\Shop\InventoryController;
use App\Http\Controllers\Shop\PosController;
use App\Http\Controllers\Shop\InvoiceController;
use App\Http\Controllers\Shop\WarrantyController;
use App\Http\Controllers\Shop\ClaimsController;


Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'index')->name('login');
    Route::get('/login', 'index')->name('admin.login');
    Route::get('/logout', 'logout');
    Route::post('/submit_login', 'login_validate');

});
Route::group(['middleware' => 'user'], function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');

    });

    Route::controller(InventoryController::class)->group(function () {
        Route::get('inventory', [InventoryController::class, 'index'])->name('inventory.show');
        Route::post('storeProduct', [InventoryController::class, 'storeProduct'])->name('shops.products.store');
        Route::post('deleteProduct', [InventoryController::class, 'delete'])->name('shops.products.delete');
        Route::post('updateProduct', [InventoryController::class, 'updateProduct'])->name('shops.products.update');
    });

    // pos
    Route::get('pos', [PosController::class, 'index'])->name('pos.show');

    // warranty
    Route::get('warranty', [WarrantyController::class, 'index'])->name('warranty.show');

    // claims
    Route::get('claims', [ClaimsController::class, 'index'])->name('claims.show');


    Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');

});
