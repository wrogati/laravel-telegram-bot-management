<?php

namespace TelegramBot\Services\TelegramBot\DTO\Bot;

use TelegramBot\Services\TelegramBot\DTO\Message\Location;
use TelegramBot\Services\TelegramBot\DTO\User\User;

class ChosenInlineResult
{
    public function __construct(
        public string    $resultId,
        public ?User     $from,
        public ?Location $location,
        public ?string   $inlineMessageId,
        public string    $query
    )
    {
    }

    public static function makeFromArray(array $chosenInlineResult): self
    {
        return new self(
            $chosenInlineResult['result_id'],
            isset($chosenInlineResult['from']) ? User::makeFromArray($chosenInlineResult['from']) : null,
            isset($chosenInlineResult['location']) ? Location::makeFromArray($chosenInlineResult['location']) : null,
            $chosenInlineResult['inline_message_id'] ?? null,
            $chosenInlineResult['query'],
        );
    }
}