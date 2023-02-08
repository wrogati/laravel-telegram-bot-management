<?php

namespace TelegramBot\Message\Infrastructure\Repositories;

use App\Models\Message;
use TelegramBot\Message\Domain\DTO\StoreMessageDTO;
use TelegramBot\Message\Domain\Repositories\MessageRepository;

class MessageEloquentRepository implements MessageRepository
{
    public function __construct(private readonly Message $model)
    {
    }

    public function store(StoreMessageDTO $dto): Message
    {
        return $this->model
            ->newQuery()
            ->create($dto->toArray(true));
    }
}
