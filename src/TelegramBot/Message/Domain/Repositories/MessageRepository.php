<?php

namespace TelegramBot\Message\Domain\Repositories;

use App\Models\Message;
use TelegramBot\Message\Domain\DTO\StoreMessageDTO;

interface MessageRepository
{
    public function store(StoreMessageDTO $dto): Message;
}
