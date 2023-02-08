<?php

namespace App\Services\TelegramService\app\DTO\Message;

use TelegramBot\Shared\Domain\Traits\ObjectToArray;

class MessageAutoDeleteTimerChanged
{
    use ObjectToArray;

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
