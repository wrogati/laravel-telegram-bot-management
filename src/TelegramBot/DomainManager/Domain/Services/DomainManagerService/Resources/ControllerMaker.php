<?php

namespace TelegramBot\DomainManager\Domain\Services\DomainManagerService\Resources;

use TelegramBot\DomainManager\Domain\Enums\StubEnum;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Replacers\ControllerReplacer;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Validators\ControllerValidator;

class ControllerMaker extends Maker
{
    public function __construct()
    {
        $this->validator = new ControllerValidator();
        $this->replacer = new ControllerReplacer();
        $this->enum = StubEnum::CONTROLLER;
    }
}
