<?php

namespace TelegramBot\Bot\Application;

use App\Models\Bot;
use TelegramBot\Shared\Domain\Repositories\BotRepository;

class Show
{
    public function __construct(private readonly BotRepository $botRepository)
    {
    }

    public function handle(string $botId): Bot
    {
        return $this->botRepository->getById($botId);
    }
}
