<?php

namespace TelegramBot\DomainManager\Application;

use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Interfaces\DomainManagerInterface;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\DomainResource;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Resources\Maker;

class DomainManager implements DomainManagerInterface
{
    private Maker $maker;

    public function handle(string $domain, ?string $class): DomainResource
    {
        return $this->maker->handle($domain, $class);
    }

    public function setMaker(Maker $maker): self
    {
        $this->maker = $maker;

        return $this;
    }
}
