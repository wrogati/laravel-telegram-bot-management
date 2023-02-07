<?php

namespace TelegramBot\Telegram\Domain\Services\Telegram;

use TelegramBot\Telegram\Application\Bot;
use TelegramBot\Telegram\Application\Location;
use TelegramBot\Telegram\Application\Message;
use TelegramBot\Telegram\Domain\Services\Telegram\Contracts\BotContract;
use TelegramBot\Telegram\Domain\Services\Telegram\Contracts\BotLocationContract;
use TelegramBot\Telegram\Domain\Services\Telegram\Contracts\BotMessageContract;
use TelegramBot\Telegram\Domain\Services\Telegram\Contracts\TelegramBotServiceContract;
use TelegramBot\Telegram\Infrastructure\Http\TelegramClient;

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
