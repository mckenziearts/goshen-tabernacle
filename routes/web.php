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

/*
 * Redirect url to protect admin panel
 */
Route::redirectMap([
    '.env' => 'https://www.youtube.com/watch?v=M8ogFbLP9XQ',
    'wp-login' => 'https://www.youtube.com/watch?v=M8ogFbLP9XQ',
    'wp-admin' => 'https://www.youtube.com/watch?v=M8ogFbLP9XQ',
    'youtube' => 'https://www.youtube.com/channel/UCOhyRt-xCcrmbNxu-eT9AOg',
]);

Route::view('/', 'welcome')->name('soon')->middleware('theme:default');
Route::view('/podcasts', 'podcasts')->name('podcasts')->middleware('theme:default');

Route::mediaLibrary();
