<?php

namespace TelegramBot\Auth\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use TelegramBot\Auth\Domain\Repositories\SessionRepository;
use TelegramBot\Auth\Infrastructure\Repositories\SessionEloquentRepository;

class AuthServiceProvider extends ServiceProvider
{
    public function register()
    {
        app()->bind(SessionRepository::class, fn() => app(SessionEloquentRepository::class));
    }
}
