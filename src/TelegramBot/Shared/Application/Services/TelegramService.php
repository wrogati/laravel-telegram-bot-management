<?php

namespace TelegramBot\Shared\Application\Services;

use App\Services\TelegramService\app\Services\TelegramBot\Actions\Contracts\BotContract;
use App\Services\TelegramService\app\Services\TelegramBot\Actions\Contracts\BotLocationContract;
use App\Services\TelegramService\app\Services\TelegramBot\Actions\Contracts\BotMessageContract;
use App\Services\TelegramService\app\Services\TelegramBot\Contracts\TelegramBotServiceContract;
use App\Services\TelegramService\app\Services\TelegramBot\TelegramBot;
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

    public function message(): BotMessageContract
    {
        return $this->bot->message();
    }

    public function location(): BotLocationContract
    {
        return $this->bot->location();
    }
}
