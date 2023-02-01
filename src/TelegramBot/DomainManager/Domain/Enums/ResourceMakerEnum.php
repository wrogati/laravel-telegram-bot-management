<?php

namespace TelegramBot\DomainManager\Domain\Enums;

use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Resources\ControllerMaker;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Resources\DomainMaker;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Resources\Maker;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Resources\RequestMaker;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Resources\ResourceMaker;

enum ResourceMakerEnum
{
    case NEW;
    case CONTROLLER;
    case REQUEST;
    case RESOURCE;

    public function action(): string
    {
        return match ($this) {
            self::NEW => 'new',
            self::CONTROLLER => 'controller',
            self::REQUEST => 'request',
            self::RESOURCE => 'resource'
        };
    }

    public static function getByAction(string $action): Maker
    {
        return match ($action) {
            self::NEW->action() => new DomainMaker(),
            self::CONTROLLER->action() => new ControllerMaker(),
            self::REQUEST->action() => new RequestMaker(),
            self::RESOURCE->action() => new ResourceMaker()
        };
    }
}
