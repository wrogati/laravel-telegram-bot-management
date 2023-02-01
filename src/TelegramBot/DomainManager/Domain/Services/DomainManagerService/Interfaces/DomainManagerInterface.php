<?php

namespace TelegramBot\DomainManager\Domain\Services\DomainManagerService\Interfaces;

use TelegramBot\DomainManager\Domain\Services\DomainManagerService\DomainResource;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Resources\Maker;

interface DomainManagerInterface
{
    public function handle(string $domain, ?string $class): DomainResource;

    public function setMaker(Maker $maker): self;
}
