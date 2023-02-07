<?php

namespace TelegramBot\Telegram;

use TelegramBot\Core\Contracts\DomainInterface;
use TelegramBot\Telegram\Infrastructure\Providers\TelegramServiceProvider;

class Domain extends DomainInterface
{
    public function registerProvider(): array
    {
        return [
            TelegramServiceProvider::class,
        ];
    }
}
