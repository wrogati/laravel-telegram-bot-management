<?php

namespace App\Services\TelegramService\app\Services\TelegramBot\Actions\Contracts;

use App\Services\TelegramService\app\Services\TelegramBot\DTO\Message\Message;
use App\Services\TelegramService\app\Services\TelegramBot\DTO\Message\Message as MessageDTO;
use App\Services\TelegramService\app\Services\TelegramBot\Http\DTO\Location\Location as LocationDTO;
use App\Services\TelegramService\app\Services\TelegramBot\Http\LocationClient;
use App\Services\TelegramService\app\Services\TelegramBot\Http\MessageClient;
use App\Services\TelegramService\app\Services\TelegramBot\Http\TelegramClient;

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
