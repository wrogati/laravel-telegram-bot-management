<?php

namespace App\Services\TelegramService\app\Services\TelegramBot\Dice;

class TelegramDice
{
    public function __construct(
        public readonly string $emoji,
        public readonly int    $value
    )
    {
    }

    public static function makeFromArray(array $dice): self
    {
        return new self(
            $dice['emoji'],
            $dice['value'],
        );
    }
}
