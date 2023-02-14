<?php

namespace TelegramBot\Auth\Domain\DTO;

use TelegramBot\Shared\Domain\Traits\ObjectToArray;

class DisableSessionDTO
{
    use ObjectToArray;

    public function __construct(
        public readonly string $disabledAt,
        public readonly string $disabledBySessionId,
        public readonly bool $isActive
    )
    {
    }
}
