<?php

namespace TelegramBot\DomainManager\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use TelegramBot\DomainManager\Application\DomainManager;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Interfaces\DomainManagerInterface;

class DomainManagerServiceProvider extends ServiceProvider
{
    public function register()
    {
        app()->bind(DomainManagerInterface::class, fn() => new DomainManager());
    }
}
