<?php

namespace App\Services\TelegramService\app\Contracts;

use App\Services\TelegramService\app\DTO\Bot\Update;
use App\Services\TelegramService\app\DTO\User\User;

interface BotContract
{
    public function logout(): bool;

    public function getInfo(): ?User;

    /**
     * @return Update[]
     */
    public function getUpdates(): array;
}
