<?php

namespace TelegramBot\Services\TelegramBot\DTO\Video;

class VideoChatScheduled
{
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