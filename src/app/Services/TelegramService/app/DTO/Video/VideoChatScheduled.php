<?php

namespace App\Services\TelegramService\app\DTO\Video;

use TelegramBot\Shared\Domain\Traits\ObjectToArray;

class VideoChatScheduled
{
    use ObjectToArray;

    public function __construct(
        public readonly int $startDate
    )
    {
    }

    public static function makeFromArray(array $data): self
    {
        return new self(
            $data['start_date']
        );
    }
}
