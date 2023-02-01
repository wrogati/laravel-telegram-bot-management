<?php

namespace TelegramBot\DomainManager\Domain\Services\DomainManagerService\Validators;

class ValidatorDTO
{
    public function __construct(
        public readonly mixed $content,
    )
    {
    }
}
