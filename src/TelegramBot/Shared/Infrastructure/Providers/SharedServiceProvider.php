<?php

namespace TelegramBot\Shared\Infrastructure\Providers;

use App\Services\TelegramService\app\Contracts\MessageContract;
use App\Services\TelegramService\TelegramBot;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use TelegramBot\Shared\Application\TelegramService;
use TelegramBot\Shared\Domain\Repositories\BotRepository;
use TelegramBot\Shared\Infrastructure\Repositories\BotEloquentRepository;

class SharedServiceProvider extends ServiceProvider
{
    public function register()
    {
        /** @var Application $app */
        app()->bind('token', fn() => request()->route('token'));

        app()->bind(TelegramBot::class, fn($app, $params) => new TelegramBot(...$params));

        app()->bind(TelegramService::class, fn($app, $params) => new TelegramService(...$params));

        app()->bind(MessageContract::class, function () {
            $telegramService = app(TelegramService::class, [app('token')]);

            return $telegramService->message();
        });

        app()->bind(BotRepository::class, fn() => app(BotEloquentRepository::class));
    }
}
