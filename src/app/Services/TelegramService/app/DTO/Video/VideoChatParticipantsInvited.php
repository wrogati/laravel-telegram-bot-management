<?php

namespace App\Services\TelegramService\app\DTO\Video;

use App\Services\TelegramService\app\DTO\User\User;
use TelegramBot\Shared\Domain\Traits\ObjectToArray;

class VideoChatParticipantsInvited
{
    use ObjectToArray;

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
