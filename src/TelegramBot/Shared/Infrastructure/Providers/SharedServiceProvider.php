<?php

namespace TelegramBot\Shared\Infrastructure\Providers;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use TelegramBot\Shared\Application\TelegramService;
use TelegramBot\Telegram\Domain\Services\Telegram\TelegramBot;

class SharedServiceProvider extends ServiceProvider
{
    public function register()
    {
        /** @var Application $app */

        app()->bind(TelegramBot::class, fn($app, ...$params) => new TelegramBot(...$params));
        app()->bind(TelegramService::class, fn($app, ...$params) => new TelegramService(...$params));
    }
}
