<?php

namespace App\Services\TelegramService\app\Services\TelegramBot\Contracts;

use App\Services\TelegramService\app\Services\TelegramBot\Actions\Contracts\BotContract;
use App\Services\TelegramService\app\Services\TelegramBot\Actions\Contracts\BotMessageContract;

interface TelegramBotServiceContract
{
    public function bot(): BotContract;
    public function message(): BotMessageContract;
}
