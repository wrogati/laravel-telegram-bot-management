<?php

namespace TelegramBot\Telegram\Application;

use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Message\Message;
use TelegramBot\Telegram\Infrastructure\Http\DTO\Location\Location as LocationDTO;
use TelegramBot\Telegram\Infrastructure\Http\LocationClient;
use TelegramBot\Telegram\Infrastructure\Http\TelegramClient;

class Location
{
    private LocationClient $client;

    public function __construct(TelegramClient $baseClient)
    {
        $this->client = new LocationClient($baseClient);
    }

    public function sendLocation(LocationDTO $location): ?Message
    {
        $response = $this->client->sendLocation(['json' => $location->toArray()]);

        $data = json_decode($response->getBody(), true)['result'];

        if (empty($data))
            return null;

        return Message::makeFromArray($data);
    }
}
