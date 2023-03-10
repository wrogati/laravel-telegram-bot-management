<?php

namespace App\Services\TelegramService\app\DTO\Bot;

use App\Services\TelegramService\app\DTO\User\User;

class InlineQuery
{
    public function __construct(
        public string  $id,
        public User    $from,
        public string  $query,
        public string  $offset,
        public ?string $chatType
    )
    {
    }

    public static function makeFromArray(array $inlineQuery): self
    {
        return new self(
            $inlineQuery['id'],
            $inlineQuery['from'],
            $inlineQuery['query'],
            $inlineQuery['offset'],
            $inlineQuery['chat_type'] ?? null,
        );
    }
}
