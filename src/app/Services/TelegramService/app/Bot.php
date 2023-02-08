<?php

namespace App\Services\TelegramService\app;

use App\Services\TelegramService\app\Contracts\BotContract;
use App\Services\TelegramService\app\DTO\Bot\Update;
use App\Services\TelegramService\app\DTO\User\User;
use App\Services\TelegramService\app\Http\BotClient;
use App\Services\TelegramService\app\Http\TelegramClient;

class Bot implements BotContract
{
    private BotClient $client;

    public function __construct(TelegramClient $baseClient)
    {
        $this->client = new BotClient($baseClient);
    }

    public function logout(): bool
    {
        $response = $this->client->logout();

        $data = json_decode($response->getBody(), true)['result'];
        if (empty($data))
            return false;

        return $data;
    }

    public function getInfo(): ?User
    {
        $response = $this->client->getMe();

        $data = json_decode($response->getBody(), true)['result'];

        if (empty($data))
            return null;

        return User::makeFromArray($data);
    }

    public function getUpdates(): array
    {
        $response = $this->client->getUpdates();

        $data = json_decode($response->getBody(), true)['result'];

        return Update::makeMultiplesFromArray($data);
    }
}
