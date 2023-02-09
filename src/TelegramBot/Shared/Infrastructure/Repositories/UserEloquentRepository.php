<?php

namespace TelegramBot\Shared\Infrastructure\Repositories;

use App\Models\User;
use MongoDB\BSON\ObjectId;
use TelegramBot\Shared\Domain\Repositories\UserRepository;
use TelegramBot\User\Domain\DTO\UserCreateDTO;
use TelegramBot\User\Domain\DTO\UserUpdateDTO;

class UserEloquentRepository implements UserRepository
{
    public function __construct(private readonly User $model)
    {
    }

    public function store(UserCreateDTO $dto): User
    {
        return $this->model
            ->newQuery()
            ->create($dto->toArray(true));
    }

    public function update(User $user, UserUpdateDTO $dto): bool
    {
        return $user->update($dto->toArray());
    }

    public function getById(string $id): User
    {
        return $this->model
            ->newQuery()
            ->findOrFail(new ObjectId($id));
    }

    public function inactivate(User $user): bool
    {
        return $user->update(['active' => false]);
    }

    public function activate(User $user): bool
    {
        return $user->update(['active' => true]);
    }

    public function getByEmail(string $email): User
    {
        return $this->model
            ->newQuery()
            ->where('email', $email)
            ->firstOrFail();
    }
}
