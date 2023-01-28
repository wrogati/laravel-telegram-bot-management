<?php

namespace App\Services\TelegramService\app\Services\TelegramBot\Actions\Contracts;

use App\Services\TelegramService\app\Services\TelegramBot\DTO\Message\Message;
use App\Services\TelegramService\app\Services\TelegramBot\Http\DTO\Location\Location as LocationDTO;

interface BotLocationContract
{
    public function sendLocation(LocationDTO $location): ?Message;
}
