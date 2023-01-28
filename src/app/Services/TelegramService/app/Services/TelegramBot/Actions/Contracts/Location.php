<?php

namespace TelegramBot\Services\TelegramBot\Actions\Contracts;

use TelegramBot\Services\TelegramBot\DTO\Message\Message;
use TelegramBot\Services\TelegramBot\DTO\Message\Message as MessageDTO;
use TelegramBot\Services\TelegramBot\Http\DTO\Location\Location as LocationDTO;
use TelegramBot\Services\TelegramBot\Http\LocationClient;
use TelegramBot\Services\TelegramBot\Http\MessageClient;
use TelegramBot\Services\TelegramBot\Http\TelegramClient;

class Location implements BotLocationContract
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

        return MessageDTO::makeFromArray($data);
    }
}