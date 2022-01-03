<?php

use App\Http\Controllers\BrochuresController;
use App\Http\Controllers\LiveController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home')->middleware('theme:default');

// Pages
Route::middleware('theme:default')->group(function () {
    Route::view('/podcasts', 'podcasts')->name('podcasts');
    Route::view('/william-marrion-brahnam', 'pages.wmb.about')->name('wmb.about');
});
Route::get('live', [LiveController::class, 'streaming'])->name('live');
Route::get('/brochures', [BrochuresController::class, 'index'])->name('brochures');

// Redirect url to protect admin panel
Route::redirectMap([
    '.env' => 'https://www.youtube.com/watch?v=M8ogFbLP9XQ',
    'wp-login' => 'https://www.youtube.com/watch?v=M8ogFbLP9XQ',
    'wp-admin' => 'https://www.youtube.com/watch?v=M8ogFbLP9XQ',
    'youtube' => 'https://www.youtube.com/channel/UCOhyRt-xCcrmbNxu-eT9AOg',
    'facebook' => 'https://www.facebook.com/goshentabernacleofficiel',
    'instagram' => 'https://www.instagram.com/goshentabernacleofficiel',
    'pinterest' => 'https://www.pinterest.com/goshentabernacle',
]);

// Package routes
Route::mediaLibrary();
