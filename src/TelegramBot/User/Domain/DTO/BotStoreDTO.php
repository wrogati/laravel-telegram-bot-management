<?php

namespace TelegramBot\User\Domain\DTO;

use TelegramBot\Shared\Domain\Traits\ObjectToArray;

class BotStoreDTO
{
    use ObjectToArray;

    public function __construct(
        public readonly string $telegramId,
        public readonly string $createdBy
    )
    {
    }
}
