<?php

namespace App\Services\TelegramService\app\Services\TelegramBot\Actions\Contracts;

use App\Services\TelegramService\app\Services\TelegramBot\DTO\Bot\Update;
use App\Services\TelegramService\app\Services\TelegramBot\DTO\User\User;

interface BotContract
{
    public function logout(): bool;

    public function getInfo(): ?User;

    /**
     * @return Update[]
     */
    public function getUpdates(): array;
}
