<?php

namespace App\Services\TelegramService\app\DTO\Dice;

use TelegramBot\Shared\Domain\Traits\ObjectToArray;

class TelegramDice
{
    use ObjectToArray;

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
