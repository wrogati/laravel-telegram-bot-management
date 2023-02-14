<?php

namespace TelegramBot\Shared\Infrastructure\Providers;

use App\Services\TelegramService\TelegramBotManager;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use TelegramBot\Shared\Application\TelegramService;
use TelegramBot\Shared\Domain\Repositories\BotRepository;
use TelegramBot\Shared\Infrastructure\Repositories\BotEloquentRepository;

class SharedServiceProvider extends ServiceProvider
{
    public function register()
    {
        $uri = explode('/', request()->getRequestUri());
dd(request()->getRequestUri());
        /** @var Application $app */
        app()->bind(TelegramService::class, fn($app) => (new TelegramBotManager())->handle($uri[2]));

        app()->bind(BotRepository::class, fn() => app(BotEloquentRepository::class));
    }
}
