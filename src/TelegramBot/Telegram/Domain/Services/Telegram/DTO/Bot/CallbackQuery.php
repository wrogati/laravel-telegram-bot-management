<?php

namespace TelegramBot\Telegram\Domain\Services\Telegram\DTO\Bot;

use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Message\Message;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\User\User;

class CallbackQuery
{
    public function __construct(
        public string   $id,
        public ?User    $from,
        public ?Message $message,
        public ?string  $inlineMessageId,
        public string   $chatInstance,
        public ?string  $date,
        public ?string  $gameShortName
    )
    {
    }

    public static function makeFromArray(array $callbackQuery): self
    {
        return new self(
            $callbackQuery['id'],
            isset($callbackQuery['from']) ? User::makeFromArray($callbackQuery['from']) : null,
            isset($callbackQuery['message']) ? Message::makeFromArray($callbackQuery['message']): null,
            $callbackQuery['inline_message_id'] ?? null,
            $callbackQuery['chat_instance'],
            $callbackQuery['data'] ?? null,
            $callbackQuery['game_short_name'] ?? null,

        );
    }
}
