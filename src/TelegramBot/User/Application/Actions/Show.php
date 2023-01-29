<?php

namespace TelegramBot\User\Application\Actions;

use App\Models\User;
use TelegramBot\User\Domain\Repository\UserRepository;

class Show
{
    public function __construct(private readonly UserRepository $userRepository)
    {
    }

    public function handle(string $userId): User
    {
        return $this->userRepository->getById($userId);
    }
}
