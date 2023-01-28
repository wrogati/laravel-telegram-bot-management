<?php

namespace TelegramBot\Services\TelegramBot\Contracts;

use TelegramBot\Services\TelegramBot\Actions\Contracts\BotContract;
use TelegramBot\Services\TelegramBot\Actions\Contracts\BotMessageContract;

interface TelegramBotServiceContract
{
    public function bot(): BotContract;
    public function message(): BotMessageContract;
}