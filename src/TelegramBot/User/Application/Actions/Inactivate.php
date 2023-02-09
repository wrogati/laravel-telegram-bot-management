<?php

namespace TelegramBot\User\Application\Actions;

use App\Models\User;
use TelegramBot\User\Domain\Repositories\UserRepository;
use TelegramBot\User\Infrastructure\Exceptions\UserNotInactivatedException;

class Inactivate
{
    public function __construct(private readonly UserRepository $userRepository)
    {
    }

    /**
     * @throws UserNotInactivatedException
     */
    public function handle(string $userId): void
    {
        $user = $this->userRepository->getById($userId);

        if (!$this->userRepository->inactivate($user))
            throw new UserNotInactivatedException();
    }
}
