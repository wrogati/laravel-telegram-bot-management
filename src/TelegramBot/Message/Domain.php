<?php

namespace TelegramBot\Message;

use TelegramBot\Core\Contracts\DomainInterface;
use TelegramBot\Message\Infrastructure\Providers\MessageServiceProvider;
use TelegramBot\Message\Infrastructure\Providers\MessageRouteProvider;

class Domain extends DomainInterface
{
    public function registerProvider(): array
    {
        return [
            MessageServiceProvider::class,
            MessageRouteProvider::class,
        ];
    }
}
