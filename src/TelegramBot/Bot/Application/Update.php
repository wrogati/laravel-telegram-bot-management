<?php

namespace TelegramBot\Bot\Application;

use TelegramBot\Bot\Domain\DTO\BotUpdateDTO;
use TelegramBot\Bot\Infrastructure\Exceptions\BotNotUpdatedException;
use TelegramBot\Shared\Domain\Repositories\BotRepository;

class Update
{
    public function __construct(private readonly BotRepository $botRepository)
    {
    }

    /**
     * @throws BotNotUpdatedException
     */
    public function handle(array $data): void
    {
        $bot = $this->botRepository->getById($data['bot_id']);

        $dto = new BotUpdateDTO();

        if (!$this->botRepository->update($bot, $dto))
            throw new BotNotUpdatedException();
    }
}
