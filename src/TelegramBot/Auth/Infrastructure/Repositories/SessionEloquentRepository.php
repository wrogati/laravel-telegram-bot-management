<?php

namespace TelegramBot\Auth\Infrastructure\Repositories;

use App\Models\Session;
use App\Models\User;
use TelegramBot\Auth\Domain\DTO\SessionStoreDTO;
use TelegramBot\Auth\Domain\Repositories\SessionRepository;

class SessionEloquentRepository implements SessionRepository
{
    public function __construct(private readonly Session $model)
    {
    }

    public function store(User $user, SessionStoreDTO $dto): Session
    {
        return $user->session()->create($dto->toArray(true));
    }
}
