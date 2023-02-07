<?php

namespace TelegramBot\Telegram\Application;

use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Bot\Update;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\User\User;
use TelegramBot\Telegram\Infrastructure\Http\BotClient;
use TelegramBot\Telegram\Infrastructure\Http\TelegramClient;

class Bot
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
