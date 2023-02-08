<?php

namespace TelegramBot\Shared\Application;

use App\Services\TelegramService\app\Contracts\BotContract;
use App\Services\TelegramService\app\Contracts\LocationContract;
use App\Services\TelegramService\app\Contracts\MessageContract;
use App\Services\TelegramService\app\Contracts\TelegramBotServiceContract;
use App\Services\TelegramService\TelegramBot;
use TelegramBot\Shared\Domain\Services\TelegramServiceInterface;

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

    public function message(): MessageContract
    {
        return $this->bot->message();
    }

    public function location(): LocationContract
    {
        return $this->bot->location();
    }
}
