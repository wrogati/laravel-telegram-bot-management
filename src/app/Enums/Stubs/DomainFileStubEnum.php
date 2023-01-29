<?php

namespace App\Enums\Stubs;

enum DomainFileStubEnum
{
    case DOMAIN;
    case ROUTE;
    case SERVICE;

    public function stub(): string
    {
        $basePath = sprintf('%s/%s', app_path(), 'Services/DomainService/Stubs');

        return match ($this) {
            self::DOMAIN => file_get_contents(sprintf('%s/%s', $basePath, 'Domain.stub')),
            self::ROUTE => file_get_contents(sprintf('%s/%s', $basePath, 'DomainRouteProvider.stub')),
            self::SERVICE => file_get_contents(sprintf('%s/%s', $basePath, 'DomainServiceProvider.stub')),
        };
    }
}
