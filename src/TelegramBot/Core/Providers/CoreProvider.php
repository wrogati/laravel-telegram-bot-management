<?php

namespace TelegramBot\Core\Providers;

use Illuminate\Support\ServiceProvider;
use TelegramBot\Core\Classes\DomainManager;

class CoreProvider extends ServiceProvider
{
    public function register()
    {
        $providers = DomainManager::instance()->getproviders();
        foreach ($providers as $provider) {
            $this->app->register($provider);
        }
    }
}
