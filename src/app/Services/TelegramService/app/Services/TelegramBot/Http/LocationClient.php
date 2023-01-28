<?php

namespace App\Services\TelegramService\app\Services\TelegramBot\Http;

use GuzzleHttp\Psr7\Response;

class LocationClient
{
    public function __construct(private readonly TelegramClient $client)
    {
    }

    public function sendLocation(array $data): Response
    {
        return $this->client->makeRequest(
            'post',
            'sendLocation',
            $data
        );
    }
}
