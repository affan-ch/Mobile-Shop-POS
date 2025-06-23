<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shop\LoginController;

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'index')->name('welcome.login');
    Route::get('/login', 'index')->name('admin.login');

});
