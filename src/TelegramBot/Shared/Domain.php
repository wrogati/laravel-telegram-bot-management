<?php

namespace TelegramBot\Shared;

use TelegramBot\Core\Contracts\DomainInterface;
use TelegramBot\Shared\Infrastructure\Providers\SharedServiceProvider;

class Domain extends DomainInterface
{
    public function registerProvider(): array
    {
        return [
            SharedServiceProvider::class
        ];
    }
}
