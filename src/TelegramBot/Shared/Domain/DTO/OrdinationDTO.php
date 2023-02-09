<?php

namespace TelegramBot\Shared\Domain\DTO;

class OrdinationDTO
{
    public function __construct(
        public readonly string $column,
        public readonly string $direction
    )
    {
    }
}
