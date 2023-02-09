<?php

namespace TelegramBot\User\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use TelegramBot\Shared\Domain\Repositories\UserRepository;
use TelegramBot\Shared\Infrastructure\Repositories\UserEloquentRepository;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        //TODO:: handle with all interfaces for domain with external file
        app()->bind(UserRepository::class, fn()=> app(UserEloquentRepository::class));
    }
}
