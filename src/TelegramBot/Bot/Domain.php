<?php

namespace TelegramBot\Bot;

use TelegramBot\Core\Contracts\DomainInterface;
use TelegramBot\Bot\Infrastructure\Providers\BotServiceProvider;
use TelegramBot\Bot\Infrastructure\Providers\BotRouteProvider;

class Domain extends DomainInterface
{
    public function registerProvider(): array
    {
        return [
            BotServiceProvider::class,
            BotRouteProvider::class,
        ];
    }
}
