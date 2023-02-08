<?php

namespace App\Services\TelegramService;

use App\Services\TelegramService\app\Bot;
use App\Services\TelegramService\app\Contracts\BotContract;
use App\Services\TelegramService\app\Contracts\LocationContract;
use App\Services\TelegramService\app\Contracts\MessageContract;
use App\Services\TelegramService\app\Contracts\TelegramBotServiceContract;
use App\Services\TelegramService\app\Http\TelegramClient;
use App\Services\TelegramService\app\Location;
use App\Services\TelegramService\app\Message;

class TelegramBot implements TelegramBotServiceContract
{
    private TelegramClient $baseClient;

    public function __construct(string $token)
    {
        $this->baseClient = new TelegramClient($token);
    }

    public function message(): MessageContract
    {
        return new Message($this->baseClient);
    }

    public function bot(): BotContract
    {
        return new Bot($this->baseClient);
    }

    public function location(): LocationContract
    {
        return new Location($this->baseClient);
    }
}
