<?php

namespace TelegramBot\DomainManager\Domain\Services\DomainManagerService\Replacers;

class ReplacerDTO
{
    public function __construct(
        public string         $content,
        public readonly array $replace,
    )
    {
    }
}
