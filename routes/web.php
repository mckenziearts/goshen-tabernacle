<?php

use App\Http\Controllers\BrochuresController;
use App\Http\Controllers\ChantController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\LiveController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::view('/podcasts', 'podcasts')->name('podcasts');
Route::view('/william-marrion-branham', 'pages.wmb.about')->name('wmb.about');
Route::get('live', [LiveController::class, 'streaming'])->name('live');
Route::get('/brochures', [BrochuresController::class, 'index'])->name('brochures');

// Chants
Route::prefix('chants')->as('chants.')->group(function () {
    Route::get('/', [ChantController::class, 'index'])->name('index');
    Route::get('/recueil/{book:slug}', [ChantController::class, 'book'])->name('book');
    Route::get('/auteur/{author:slug}', [ChantController::class, 'author'])->name('author');
    Route::get('/{song:slug}', [ChantController::class, 'show'])->name('show');
});

Route::get('lang/{lang}', LangController::class)->name('lang');

Route::redirectMap([
    '.env' => 'https://www.youtube.com/watch?v=M8ogFbLP9XQ',
    'wp-login' => 'https://www.youtube.com/watch?v=M8ogFbLP9XQ',
    'wp-admin' => 'https://www.youtube.com/watch?v=M8ogFbLP9XQ',
    'youtube' => 'https://www.youtube.com/@GoshenTabernacleDouala',
    'facebook' => 'https://www.facebook.com/goshentabernacleofficiel',
    'instagram' => 'https://www.instagram.com/goshentabernacleofficiel',
    'pinterest' => 'https://www.pinterest.com/goshentabernacle',
]);
