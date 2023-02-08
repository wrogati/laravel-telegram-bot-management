<?php

namespace TelegramBot\Shared\Domain\Services;


use App\Services\TelegramService\app\Contracts\BotContract;
use App\Services\TelegramService\app\Contracts\LocationContract;
use App\Services\TelegramService\app\Contracts\MessageContract;

interface TelegramServiceInterface
{
    public function bot(): BotContract;

    public function message(): MessageContract;

    public function location(): LocationContract;
}
