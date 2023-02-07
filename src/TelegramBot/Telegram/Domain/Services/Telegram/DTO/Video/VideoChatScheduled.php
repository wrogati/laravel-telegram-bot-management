<?php

namespace TelegramBot\Telegram\Domain\Services\Telegram\DTO\Video;

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
