<?php

namespace TelegramBot\DomainManager\Domain\Services\DomainManagerService\Resources;


use TelegramBot\DomainManager\Domain\Enums\StubEnum;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Replacers\RequestRequest;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Validators\RequestValidator;

class RequestMaker extends Maker
{
    public function __construct()
    {
        $this->validator = new RequestValidator();
        $this->replacer = new RequestRequest();
        $this->enum = StubEnum::REQUEST;
    }
}
