<?php

namespace TelegramBot\Services\TelegramBot\DTO\Video;

class VideoChatEnded
{
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