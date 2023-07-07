<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get(
    uri: '/user',
    action: fn (Request $request) => $request->user()
);
