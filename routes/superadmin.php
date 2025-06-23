<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\LoginController;
use App\Http\Controllers\SuperAdmin\DashboardController;
use App\Http\Controllers\SuperAdmin\AdminController;
use App\Http\Controllers\SuperAdmin\ShopController;

use App\Http\Controllers\SuperAdmin\InventoryController;
use App\Http\Controllers\Report\ReportsController;
use App\Http\Controllers\SuperAdmin\InvoiceController;
use App\Http\Controllers\SuperAdmin\ClaimsController;


Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'index')->name('superadmin.login');
    Route::get('/login', 'index')->name('superadmin.login');
    Route::get('/logout', 'logout');
    Route::post('/submit_login', 'login_validate');

});
Route::group(['middleware' => 'superadmin'], function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');

    });

    Route::get('/reports', [ReportsController::class, 'index'])->name('reports.index');

    Route::controller(AdminController::class)->group(function () {
        Route::get('/admins', 'index')->name('admins');
        Route::post('/admin/add', 'store')->name('add.admin');
        Route::post('admin/edit', 'edit')->name('edit.admin');
        Route::post('admin/update-password', 'updatePassword')->name('updatepass.admin');
        Route::post('admin/delete', 'delete')->name('delete.admin');
    });
    Route::controller(ShopController::class)->group(function () {
        Route::get('/shops', 'index')->name('shops');
        Route::post('/shop/add', 'store')->name('add.shop');
        Route::post('shop/edit', 'edit')->name('edit.shop');
        Route::post('shop/update-password', 'updatePassword')->name('updatepass.shop');
        Route::post('shop/delete', 'delete')->name('delete.shop');
        Route::get('admin/view-admins/{shopId}', 'viewAdmins')->name('viewadmins.shop');
        Route::post('shop/add-admin', 'addShopAdmin')->name('addShopAdmin.shop');
        Route::delete('shop/delete-admin', 'deleteShopAdmin')->name('deleteShopAdmin.shop');
    });

    Route::controller(InventoryController::class)->group(function () {
        Route::get('/shops/{shop_id}/inventory', [InventoryController::class, 'index'])->name('superadmin.inventory.show');
        Route::post('shops/storeProduct', [InventoryController::class, 'storeProduct'])->name('shops.products.store');
        Route::post('shops/deleteProduct', [InventoryController::class, 'delete'])->name('shops.products.delete');
        Route::post('shops/updateProduct', [InventoryController::class, 'updateProduct'])->name('shops.products.update');
    });
    Route::get('/shops/{shop_id}/invoices', [InvoiceController::class, 'index'])->name('superadmin.invoice.show');
    Route::get('/shops/{shop_id}/claims', [ClaimsController::class, 'index'])->name('superadmin.claims.show');
});

