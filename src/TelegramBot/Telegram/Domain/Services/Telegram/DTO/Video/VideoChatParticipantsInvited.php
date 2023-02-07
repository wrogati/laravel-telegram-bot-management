<?php

namespace TelegramBot\Telegram\Domain\Services\Telegram\DTO\Video;

use TelegramBot\Telegram\Domain\Services\Telegram\DTO\User\User;

class VideoChatParticipantsInvited
{
    public function __construct(
        /** @var User[] $users */
        public readonly array $users
    )
    {
    }

    public static function makeFromArray(array $data): self
    {
        return new self(
            User::makeMultiplesFromArray($data['users'])
        );
    }
}
