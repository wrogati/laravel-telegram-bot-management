<?php

namespace TelegramBot\Shared\Application;

use TelegramBot\Shared\Domain\Services\TelegramServiceInterface;
use TelegramBot\Telegram\Domain\Services\Telegram\Contracts\BotContract;
use TelegramBot\Telegram\Domain\Services\Telegram\Contracts\BotLocationContract;
use TelegramBot\Telegram\Domain\Services\Telegram\Contracts\BotMessageContract;
use TelegramBot\Telegram\Domain\Services\Telegram\Contracts\TelegramBotServiceContract;
use TelegramBot\Telegram\Domain\Services\Telegram\TelegramBot;

class TelegramService implements TelegramServiceInterface
{
    private TelegramBotServiceContract $bot;
    public function __construct(string $token)
    {
        $this->bot = app(TelegramBot::class, [$token]);
    }

    public function bot(): BotContract
    {
        return $this->bot->bot();
    }

    public function message(): BotMessageContract
    {
        return $this->bot->message();
    }

    public function location(): BotLocationContract
    {
        return $this->bot->location();
    }
}
