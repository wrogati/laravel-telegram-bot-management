<?php

namespace TelegramBot\Telegram\Domain\Services\Telegram\Contracts;

interface TelegramBotServiceContract
{
    public function bot(): BotContract;
    public function message(): BotMessageContract;
}
