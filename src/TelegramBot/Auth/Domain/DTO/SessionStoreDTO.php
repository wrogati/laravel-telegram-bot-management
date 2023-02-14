<?php

namespace TelegramBot\Auth\Domain\DTO;

use Illuminate\Support\Carbon;
use TelegramBot\Shared\Domain\Traits\ObjectToArray;

class SessionStoreDTO
{
    use ObjectToArray;

    public function __construct(
        public readonly string $authSecureToken,
        public readonly string $expiresIn,
        public ?Carbon $disabledAt = null,
        public ?string $disabledBySessionId = null,
        public readonly bool $isActive = true
    )
    {
    }
}
