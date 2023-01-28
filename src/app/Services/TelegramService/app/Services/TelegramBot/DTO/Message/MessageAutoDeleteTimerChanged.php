<?php

namespace App\Services\TelegramService\app\Services\TelegramBot\DTO\Message;

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
