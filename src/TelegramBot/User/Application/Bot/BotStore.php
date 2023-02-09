<?php

namespace TelegramBot\User\Application\Bot;

use App\Models\Bot;
use TelegramBot\Shared\Domain\Repositories\BotRepository;
use TelegramBot\User\Domain\DTO\BotStoreDTO;

class BotStore
{
    public function __construct(private readonly BotRepository $botRepository)
    {
    }

    public function handle(array $data): Bot
    {
        $dto = new BotStoreDTO($data['telegram_id'], $data['created_by']);

        return $this->botRepository->store($dto);
    }
}
