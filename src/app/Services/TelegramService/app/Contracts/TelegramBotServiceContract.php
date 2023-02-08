<?php

namespace App\Services\TelegramService\app\Contracts;

interface TelegramBotServiceContract
{
    public function bot(): BotContract;
    public function message(): MessageContract;
}
