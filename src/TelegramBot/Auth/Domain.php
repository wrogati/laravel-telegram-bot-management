<?php

namespace TelegramBot\Auth;

use TelegramBot\Core\Contracts\DomainInterface;
use TelegramBot\Auth\Infrastructure\Providers\AuthServiceProvider;
use TelegramBot\Auth\Infrastructure\Providers\AuthRouteProvider;

class Domain extends DomainInterface
{
    public function registerProvider(): array
    {
        return [
            AuthServiceProvider::class,
            AuthRouteProvider::class,
        ];
    }
}
