<?php

namespace App\Services\TelegramService\app\DTO;

use App\Services\TelegramService\app\DTO\User\User;
use TelegramBot\Shared\Domain\Traits\ObjectToArray;

class ProximityAlertTriggered
{
    use ObjectToArray;

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
