<?php

namespace App\Services\TelegramService\app\Services\TelegramBot\DTO;

use App\Services\TelegramService\app\Services\TelegramBot\DTO\User\User;

class ProximityAlertTriggered
{
    public function __construct(
        public readonly User $traveler,
        public readonly User $watcher,
        public readonly int  $distance
    )
    {
    }

    public static function makeFromArray(array $data): self
    {
        return new self(
            User::makeFromArray($data['traverler']),
            User::makeFromArray($data['watcher']),
            $data['distance']
        );
    }
}
