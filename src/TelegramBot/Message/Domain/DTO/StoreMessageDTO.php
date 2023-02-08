<?php

namespace TelegramBot\Message\Domain\DTO;

use MongoDB\BSON\ObjectId;
use TelegramBot\Shared\Domain\DTO\DTO;

class StoreMessageDTO extends DTO
{
    public function __construct(
        public readonly string $botId,
        public readonly string   $type,
        public readonly array    $apiResponse
    )
    {
    }
}
