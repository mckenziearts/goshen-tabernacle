<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Redirect url to protect admin panel
 */
Route::redirect('.env', 'https://www.youtube.com/watch?v=M8ogFbLP9XQ');
Route::redirect('wp-login.php', 'https://www.youtube.com/watch?v=M8ogFbLP9XQ');
Route::redirect('wp-admin', 'https://www.youtube.com/watch?v=M8ogFbLP9XQ');
Route::redirect('/youtube', 'https://www.youtube.com/channel/UCOhyRt-xCcrmbNxu-eT9AOg')->name('youtube');

Route::view('/', 'welcome')->name('soon');
Route::view('/podcasts', 'podcasts')->name('podcasts');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';
