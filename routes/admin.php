<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Report\ReportsController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\ClaimsController;

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'index')->name('admin.login');
    Route::get('/login', 'index')->name('admin.login');
    Route::get('/logout', 'logout');
    Route::post('/submit_login', 'login_validate');

});
Route::group(['middleware' => 'admin'], function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');

    });

    Route::get('/reports', [ReportsController::class, 'index'])->name('reports.index');

    Route::controller(ShopController::class)->group(function () {
        Route::get('/shops', 'index')->name('admin.shops');
        Route::post('shop/edit', 'edit')->name('edit.shop');
        Route::post('shop/update-password', 'updatePassword')->name('updatepass.shop');
        Route::post('shop/delete', 'delete')->name('delete.shop');
    });
    Route::controller(InventoryController::class)->group(function () {
        Route::get('/shops/{shop_id}/inventory', [InventoryController::class, 'index'])->name('admin.inventory.show');
        Route::post('shops/storeProduct', [InventoryController::class, 'storeProduct'])->name('shops.products.store');
        Route::post('shops/deleteProduct', [InventoryController::class, 'delete'])->name('shops.products.delete');
        Route::post('shops/updateProduct', [InventoryController::class, 'updateProduct'])->name('shops.products.update');
    });
    Route::get('/shops/{shop_id}/invoices', [InvoiceController::class, 'index'])->name('admin.invoice.show');
    Route::get('/shops/{shop_id}/claims', [ClaimsController::class, 'index'])->name('admin.claims.show');
});

