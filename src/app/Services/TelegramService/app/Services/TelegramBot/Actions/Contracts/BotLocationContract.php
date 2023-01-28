<?php

namespace TelegramBot\Services\TelegramBot\Actions\Contracts;

use TelegramBot\Services\TelegramBot\DTO\Message\Message;
use TelegramBot\Services\TelegramBot\Http\DTO\Location\Location as LocationDTO;

interface BotLocationContract
{
    public function sendLocation(LocationDTO $location): ?Message;
}