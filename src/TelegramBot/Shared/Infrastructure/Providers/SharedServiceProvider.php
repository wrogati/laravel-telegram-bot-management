<?php

namespace TelegramBot\Shared\Infrastructure\Providers;

use App\Services\TelegramService\app\Services\TelegramBot\TelegramBot;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use TelegramBot\Shared\Application\Services\TelegramService;

class SharedServiceProvider extends ServiceProvider
{
    public function register()
    {
        /** @var Application $app */

        app()->bind(TelegramBot::class, fn($app, $params) => new TelegramBot(...$params));
        app()->bind(TelegramService::class, fn($app, $params) => new TelegramService(...$params));
    }
}
