<?php

namespace TelegramBot\Auth\Domain\Repositories;

use App\Models\Session;
use App\Models\User;
use TelegramBot\Auth\Domain\DTO\SessionStoreDTO;

interface SessionRepository
{
    public function store(User $user, SessionStoreDTO $dto): Session;

    public function getByAuthSecureToken(string $authSecureToken): ?Session;
}
