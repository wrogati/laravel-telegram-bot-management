<?php

namespace TelegramBot\User\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use TelegramBot\User\Domain\Repository\UserRepository;
use TelegramBot\User\Infrastructure\Repository\UserEloquentRepository;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        //TODO:: handle with all interfaces for domain with external file
        app()->bind(UserRepository::class, fn()=> app(UserEloquentRepository::class));
    }
}
