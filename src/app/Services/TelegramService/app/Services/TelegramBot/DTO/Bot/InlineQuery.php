<?php

namespace TelegramBot\Services\TelegramBot\DTO\Bot;

use TelegramBot\Services\TelegramBot\DTO\User\User;

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