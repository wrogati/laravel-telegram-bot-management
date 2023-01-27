<?php

namespace TelegramBot\Message\Text;

use TelegramBot\Message\Text\Infrastructure\Providers\MessageTextRouteProvider;
use TelegramBot\Message\Text\Infrastructure\Providers\MessageTextServiceProvider;
use TelegramBot\Core\Contracts\DomainInterface;

class Domain extends DomainInterface
{
    public function registerProvider(): array
    {
        return [
            MessageTextRouteProvider::class,
            MessageTextServiceProvider::class
        ];
    }
}
