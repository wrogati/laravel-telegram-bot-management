<?php

namespace TelegramBot\Services\TelegramBot\Actions\Contracts;

use TelegramBot\Services\TelegramBot\DTO\Bot\Update;
use TelegramBot\Services\TelegramBot\DTO\User\User;

interface BotContract
{
    public function logout(): bool;

    public function getInfo(): ?User;

    /**
     * @return Update[]
     */
    public function getUpdates(): array;
}