<?php

namespace TelegramBot\User\Domain\Repository;

use App\Models\User;
use TelegramBot\User\Domain\DTO\UserCreateDTO;
use TelegramBot\User\Domain\DTO\UserUpdateDTO;

interface UserRepository
{
    public function store(UserCreateDTO $dto): User;

    public function update(User $user, UserUpdateDTO $dto): bool;

    public function getById(string $id): User;
}
