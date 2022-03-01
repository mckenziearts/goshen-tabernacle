<?php

use Modules\Song\Http\Controllers\SongController;

/*
|--------------------------------------------------------------------------
| Cpanel Routes
|--------------------------------------------------------------------------
|
| Here is where you can register cpanel routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/cantiques', [SongController::class, 'index'])->name('cantiques');
