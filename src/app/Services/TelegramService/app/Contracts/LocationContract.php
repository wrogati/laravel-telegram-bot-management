<?php

namespace App\Services\TelegramService\app\Contracts;

use App\Services\TelegramService\app\DTO\Message\Message;
use App\Services\TelegramService\app\Http\DTO\Location\Location as LocationDTO;

interface LocationContract
{
    public function sendLocation(LocationDTO $location): ?Message;
}
