<?php

namespace App\Services\TelegramService\app\Services\TelegramBot;

use App\Services\TelegramService\app\Services\TelegramBot\Actions\Bot;
use App\Services\TelegramService\app\Services\TelegramBot\Actions\Contracts\BotContract;
use App\Services\TelegramService\app\Services\TelegramBot\Actions\Contracts\BotLocationContract;
use App\Services\TelegramService\app\Services\TelegramBot\Actions\Contracts\BotMessageContract;
use App\Services\TelegramService\app\Services\TelegramBot\Actions\Contracts\Location;
use App\Services\TelegramService\app\Services\TelegramBot\Actions\Message;
use App\Services\TelegramService\app\Services\TelegramBot\Contracts\TelegramBotServiceContract;
use App\Services\TelegramService\app\Services\TelegramBot\Http\TelegramClient;

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
