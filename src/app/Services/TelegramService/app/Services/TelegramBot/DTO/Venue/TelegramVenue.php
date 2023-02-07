<?php

namespace App\Services\TelegramService\app\Services\TelegramBot\DTO\Venue;

use App\Services\TelegramService\app\Services\TelegramBot\DTO\Message\Location;

class TelegramVenue
{
    public function __construct(
        public readonly Location $location,
        public readonly string   $title,
        public readonly string   $address,
        public readonly ?string  $foursquareId,
        public readonly ?string  $foursquareType,
        public readonly ?string  $googlePlaceId,
        public readonly ?string  $googlePlaceType
    )
    {
    }

    public static function makeFromArray(array $venue): self
    {
        return new self(
            Location::makeFromArray($venue['location']),
            $venue['title'],
            $venue['address'],
            $venue['foursquare_id'] ?? null,
            $venue['foursquare_type'] ?? null,
            $venue['google_place_id'] ?? null,
            $venue['google_place_type'] ?? null,
        );
    }
}
