<?php

namespace TelegramBot\Message\Application;

use App\Services\TelegramService\app\Contracts\MessageContract;
use App\Services\TelegramService\app\Http\DTO\Message\TelegramSimpleMessage;
use MongoDB\BSON\ObjectId;
use TelegramBot\Message\Domain\DTO\StoreMessageDTO;
use TelegramBot\Message\Domain\Enums\MessageTypeEnum;
use TelegramBot\Message\Domain\Repositories\MessageRepository;

class SendSimpleMessage
{


    public function __construct(
        private readonly MessageContract $messageService,
        private readonly MessageRepository $messageRepository
    )
    {
    }

    public function handle(array $data): void
    {
        $dto = new TelegramSimpleMessage($data['chat_id'], $data['text']);

        $response = $this->messageService->sendSimpleMessage($dto);

        $dto = new StoreMessageDTO((string)new ObjectId(), MessageTypeEnum::SIMPLE->description(), $response->toArray(true));

        $this->messageRepository->store($dto);
    }
}
