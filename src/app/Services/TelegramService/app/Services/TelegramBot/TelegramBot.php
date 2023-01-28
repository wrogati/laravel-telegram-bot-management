<?php

namespace TelegramBot\Services\TelegramBot;

use TelegramBot\Services\TelegramBot\Actions\Bot;
use TelegramBot\Services\TelegramBot\Actions\Contracts\BotContract;
use TelegramBot\Services\TelegramBot\Actions\Contracts\BotLocationContract;
use TelegramBot\Services\TelegramBot\Actions\Contracts\BotMessageContract;
use TelegramBot\Services\TelegramBot\Actions\Contracts\Location;
use TelegramBot\Services\TelegramBot\Actions\Message;
use TelegramBot\Services\TelegramBot\Contracts\TelegramBotServiceContract;
use TelegramBot\Services\TelegramBot\Http\TelegramClient;

class TelegramBot implements TelegramBotServiceContract
{
    private TelegramClient $baseClient;

    public function __construct(string $token)
    {
        $this->baseClient = new TelegramClient($token);
    }

    public function message(): BotMessageContract
    {
        return new Message($this->baseClient);
    }

    public function bot(): BotContract
    {
        return new Bot($this->baseClient);
    }

    public function location(): BotLocationContract
    {
        return new Location($this->baseClient);
    }
}