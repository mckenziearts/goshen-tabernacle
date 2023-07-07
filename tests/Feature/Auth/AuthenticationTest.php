<?php

declare(strict_types=1);

use App\Models\User;
use function Pest\Laravel\postJson;

it('users can authenticate using the login', function () {
    $user = User::factory()->create();

    postJson('/login', [
        'email' => $user->email,
        'password' => 'password',
    ])->assertNoContent();

    expect(auth()->user()->id)->toBe($user->id);
})->group('auth');

it('users can not authenticate with invalid password', function () {
    $user = User::factory()->create();

    postJson('/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    expect(auth()->user())->toBeNull();
})->group('auth');
