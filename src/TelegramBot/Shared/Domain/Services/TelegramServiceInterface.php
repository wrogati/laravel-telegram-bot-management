<?php

namespace TelegramBot\Shared\Domain\Services;


use App\Services\TelegramService\app\Services\TelegramBot\Actions\Contracts\BotContract;
use App\Services\TelegramService\app\Services\TelegramBot\Actions\Contracts\BotLocationContract;
use App\Services\TelegramService\app\Services\TelegramBot\Actions\Contracts\BotMessageContract;

interface TelegramServiceInterface
{
    public function bot(): BotContract;

    public function message(): BotMessageContract;

    public function location(): BotLocationContract;
}
