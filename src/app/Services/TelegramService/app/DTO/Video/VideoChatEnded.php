<?php

namespace App\Services\TelegramService\app\DTO\Video;

use TelegramBot\Shared\Domain\Traits\ObjectToArray;

class VideoChatEnded
{
    use ObjectToArray;

    public function __construct(
        public readonly int $duration
    )
    {
    }

    public static function makeFromArray(array $data): self
    {
        return new self(
            $data['duration']
        );
    }
}
