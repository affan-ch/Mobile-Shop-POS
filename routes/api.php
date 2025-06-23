<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shop\InvoiceController;
use App\Http\Controllers\Shop\ClaimsController;
use App\Http\Controllers\Report\ReportsController;

Route::post('/pos/invoice/store', [InvoiceController::class, 'store'])->name('pos.invoice.store');

Route::get('/invoice/{id}/details', [InvoiceController::class, 'getInvoiceDetails'])->name('shop.invoices.details');

Route::get('/warranty/invoice/{id}', [InvoiceController::class, 'getInvoiceDetailsWithWarranty']);

Route::post('/warranty/claim/store', [InvoiceController::class, 'storeClaim']);

Route::get('/claims/{shop_id}', [ClaimsController::class, 'getClaimsByShop']);


Route::get('/reports/data', [ReportsController::class, 'getReportData'])->name('reports.data');
