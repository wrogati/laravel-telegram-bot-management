<?php

namespace App\Services\TelegramService\app\Services\TelegramBot\Http;

use GuzzleHttp\Psr7\Response;

class BotClient
{
    public function __construct(private readonly TelegramClient $client)
    {
    }

    public function logout(): Response
    {
        return $this->client->makeRequest('get', 'logOut');
    }

    public function getMe(): Response
    {
        return $this->client->makeRequest('get', 'getMe');
    }

    public function getUpdates(): Response
    {
        return $this->client->makeRequest('get', 'getUpdates');
    }
}
