<?php

namespace TelegramBot\DomainManager\Domain\Enums;

enum StubEnum
{
    case CONTROLLER;
    case DOMAIN;
    case REQUEST;
    case RESOURCE;
    case ROUTE_PROVIDER;
    case SERVICE_PROVIDER;

    public function stub(): string
    {
        $basePath = $this->stubBasePath();

        return match ($this) {
            self::CONTROLLER => file_get_contents(sprintf('%s/controller.stub', $basePath)),
            self::DOMAIN => file_get_contents(sprintf('%s/domain.stub', $basePath)),
            self::REQUEST => file_get_contents(sprintf('%s/request.stub', $basePath)),
            self::RESOURCE => file_get_contents(sprintf('%s/resource.stub', $basePath)),
            self::ROUTE_PROVIDER => file_get_contents(sprintf('%s/route-provider.stub', $basePath)),
            self::SERVICE_PROVIDER => file_get_contents(sprintf('%s/service-provider.stub', $basePath)),
        };
    }

    public function type(): string
    {
        return match ($this) {
            self::CONTROLLER => 'Controller',
            self::DOMAIN => 'Dominio',
            self::REQUEST => 'Request',
            self::RESOURCE => 'Resource',
            self::ROUTE_PROVIDER => 'Provedor de Rota',
            self::SERVICE_PROVIDER => 'Provider de Serviço',
        };
    }

    public function path(string $dominio = ''): string
    {
        return match ($this) {
            self::CONTROLLER => sprintf('%s/Presentation/Controllers', $dominio),
            self::DOMAIN => $dominio,
            self::REQUEST => sprintf('%s/Presentation/Requests', $dominio),
            self::RESOURCE =>sprintf('%s/Presentation/Resources', $dominio),
            self::ROUTE_PROVIDER, self::SERVICE_PROVIDER => sprintf('%s/Infrastructure/Providers', $dominio),
        };
    }

    public static function getByAction(string $action): self
    {
        return match ($action) {
            'novo' => self::DOMAIN,
            'controller' => self::CONTROLLER,
            'request' => self::REQUEST,
            'resource' => self::RESOURCE
        };
    }

    private function stubBasePath(): string
    {
        return domain_path('DomainManager/Infrastructure/Stubs');
    }
}
