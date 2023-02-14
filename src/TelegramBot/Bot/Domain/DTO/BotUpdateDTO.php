<?php

namespace TelegramBot\Bot\Domain\DTO;

use TelegramBot\Shared\Domain\Traits\ObjectToArray;

class BotUpdateDTO
{
    use ObjectToArray;

    public function __construct(public readonly bool $updated = true)
    {
    }
}
