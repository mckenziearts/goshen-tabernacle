<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel(
    channel: 'App.Models.User.{id}',
    callback: fn ($user, int $id) => $user->id === $id
);
