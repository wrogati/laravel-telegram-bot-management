<?php

namespace App\Services\TelegramService\app;

use App\Services\TelegramService\app\Contracts\LocationContract;
use App\Services\TelegramService\app\DTO\Message\Message;
use App\Services\TelegramService\app\Http\DTO\Location\Location as LocationDTO;
use App\Services\TelegramService\app\Http\LocationClient;
use App\Services\TelegramService\app\Http\TelegramClient;

class Location implements LocationContract
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
