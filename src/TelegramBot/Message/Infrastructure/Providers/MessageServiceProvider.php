<?php

namespace TelegramBot\Message\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use TelegramBot\Message\Domain\Repositories\MessageRepository;
use TelegramBot\Message\Infrastructure\Repositories\MessageEloquentRepository;

class MessageServiceProvider extends ServiceProvider
{
    public function register()
    {
        app()->bind(MessageRepository::class, fn() => app(MessageEloquentRepository::class));
    }
}
