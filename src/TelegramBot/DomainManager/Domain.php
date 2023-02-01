<?php

namespace TelegramBot\DomainManager;

use TelegramBot\Core\Contracts\DomainInterface;
use TelegramBot\DomainManager\Infrastructure\Providers\DomainManagerServiceProvider;

class Domain extends DomainInterface
{
    public function registerProvider(): array
    {
        return [
            DomainManagerServiceProvider::class
        ];
    }
}
