<?php

namespace TelegramBot\Telegram\Domain\Services\Telegram\DTO\Message;

class MessageAutoDeleteTimerChanged
{
    public function __construct(
        public readonly int $messageAutoDeleteTime
    )
    {
    }

    public static function makeFromArray(array $data): self
    {
        return new self(
            $data['message_auto_delete_time']
        );
    }
}
