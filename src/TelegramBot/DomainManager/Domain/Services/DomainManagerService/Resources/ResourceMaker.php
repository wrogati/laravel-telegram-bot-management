<?php

namespace TelegramBot\DomainManager\Domain\Services\DomainManagerService\Resources;


use TelegramBot\DomainManager\Domain\Enums\StubEnum;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Replacers\ResourceReplacer;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Validators\ResourceValidator;

class ResourceMaker extends Maker
{
    public function __construct()
    {
        $this->validator = new ResourceValidator();
        $this->replacer = new ResourceReplacer();
        $this->enum = StubEnum::RESOURCE;
    }
}
