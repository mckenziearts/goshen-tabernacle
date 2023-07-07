<?php

declare(strict_types=1);

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Notification;
use function Pest\Laravel\postJson;

it('reset password link can be requested', function (): void {
    Notification::fake();

    $user = User::factory()->create();

    postJson('/forgot-password', ['email' => $user->email]);

    Notification::assertSentTo($user, ResetPassword::class);
})->group('auth');

it('password can be reset with valid token', function (): void {
    Notification::fake();

    $user = User::factory()->create();

    postJson('/forgot-password', ['email' => $user->email]);

    Notification::assertSentTo($user, ResetPassword::class, function (object $notification) use ($user) {
        $response = postJson('/reset-password', [
            'token' => $notification->token,
            'email' => $user->email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasNoErrors();

        return true;
    });
})->group('auth');
