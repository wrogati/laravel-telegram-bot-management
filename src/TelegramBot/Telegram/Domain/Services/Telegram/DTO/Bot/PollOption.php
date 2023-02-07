<?php

namespace TelegramBot\Telegram\Domain\Services\Telegram\DTO\Bot;

class PollOption
{
    public function __construct(
        public string $text,
        public int $voterCount
    )
    {
    }

    public static function makeFromArray(array $pollOption): self
    {
        return new self(
            $pollOption['text'],
            $pollOption['voter_count'],
        );
    }

    public static function makeMultiplesFromArray(array $pollOptions): array
    {
        $options = [];

        foreach ($pollOptions as $pollOption) {
            $options[] = self::makeFromArray($pollOption);
        }

        return $options;
    }
}
