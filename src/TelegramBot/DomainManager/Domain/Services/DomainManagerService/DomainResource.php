<?php

namespace TelegramBot\DomainManager\Domain\Services\DomainManagerService;

class DomainResource
{
    public function __construct(
        public readonly string $type,
        public readonly string $path
    )
    {
    }
}
