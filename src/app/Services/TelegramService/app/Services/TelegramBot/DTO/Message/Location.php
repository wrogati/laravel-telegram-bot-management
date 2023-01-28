<?php

namespace TelegramBot\Services\TelegramBot\DTO\Message;

class Location
{
    public function __construct(
        public readonly float $longitude,
        public readonly float $latitude,
        public readonly ?float $horizontalAccuracy,
        public readonly ?int $livePeriod,
        public readonly ?int $heading,
        public readonly ?int $proximityAlertRadius
    )
    {
    }

    public static function makeFromArray(array $location): self
    {
        return new self(
            $location['longitude'],
            $location['latitude'],
            $location['horizontal_accuracy'] ?? null,
            $location['live_period'] ?? null,
            $location['heading'] ?? null,
            $location['proximity_alert_radius'] ?? null,
        );
    }
}