<?php

namespace App\Services\TelegramService\app\DTO\Bot;

use App\Services\TelegramService\app\DTO\User\User;

class PollAnswer
{
    public function __construct(
        public readonly string $pollId,
        public readonly User   $user,
        /** @var int[] $optionIds */
        public readonly array  $optionIds
    )
    {
    }

    public static function makeFromArray(array $pollAnswer): self
    {
        return new self(
            $pollAnswer['poll_id'],
            User::makeFromArray($pollAnswer['user']),
            $pollAnswer['option_ids'],
        );
    }
}
