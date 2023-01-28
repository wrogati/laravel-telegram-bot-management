<?php

namespace TelegramBot\Services\TelegramBot\DTO\Video;

use TelegramBot\Services\TelegramBot\DTO\User\User;

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