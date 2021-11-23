<?php

use Illuminate\Support\Facades\Route;
use Modules\Dashboard\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| CPanel Routes
|--------------------------------------------------------------------------
|
| Here is where you can register CPanel routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "admin" middleware group. Enjoy building your App!
|
*/

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
