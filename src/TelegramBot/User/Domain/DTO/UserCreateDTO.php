<?php

namespace TelegramBot\User\Domain\DTO;

use TelegramBot\Shared\Domain\DTO\DTO;

class UserCreateDTO extends DTO
{
    public function __construct(
        public readonly string $firstName,
        public readonly string $lastName,
        public readonly string $email,
        public readonly string $password
    )
    {
    }
}
