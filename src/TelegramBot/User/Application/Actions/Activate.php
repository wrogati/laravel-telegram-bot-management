<?php

namespace TelegramBot\User\Application\Actions;

use TelegramBot\Shared\Domain\Repositories\UserRepository;
use TelegramBot\User\Infrastructure\Exceptions\UserNotActivatedException;

class Activate
{
    public function __construct(private readonly UserRepository $userRepository)
    {
    }

    /**
     * @throws UserNotActivatedException
     */
    public function handle(string $userId): void
    {
        $user = $this->userRepository->getById($userId);

        if (!$this->userRepository->activate($user))
            throw new UserNotActivatedException();
    }
}
