<?php

namespace TelegramBot\Message\Infrastructure\Providers;

use App\Services\TelegramService\app\Contracts\MessageContract;
use Illuminate\Support\ServiceProvider;
use TelegramBot\Message\Domain\Repositories\MessageRepository;
use TelegramBot\Message\Infrastructure\Repositories\MessageEloquentRepository;
use TelegramBot\Shared\Application\TelegramService;

class MessageServiceProvider extends ServiceProvider
{
    public function register()
    {
        app()->bind(MessageRepository::class, fn() => app(MessageEloquentRepository::class));

        app()->bind(MessageContract::class, fn() => app(TelegramService::class)->message());
    }
}
