<?php

namespace App\Services\TelegramService;

use TelegramBot\Shared\Domain\Repositories\BotRepository;

class TelegramBotManager
{
    public function handle(string $botId): TelegramBot
    {
        $bot = app(BotRepository::class)->getById($botId);

        return new TelegramBot($bot->telegram_id);
    }
}
