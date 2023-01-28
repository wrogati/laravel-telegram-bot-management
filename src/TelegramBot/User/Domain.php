<?php

namespace TelegramBot\User;

use TelegramBot\Core\Contracts\DomainInterface;
use TelegramBot\User\Infrastructure\Providers\UserServiceProvider;
use TelegramBot\User\Infrastructure\Providers\UserRouteProvider;

class Domain extends DomainInterface
{
    public function registerProvider(): array
    {
        return [
            UserServiceProvider::class,
            UserRouteProvider::class,
        ];
    }
}
