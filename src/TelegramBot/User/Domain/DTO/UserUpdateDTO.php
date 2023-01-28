<?php

namespace TelegramBot\User\Domain\DTO;

use TelegramBot\Shared\Domain\DTO\DTO;

class UserUpdateDTO extends DTO
{
    public function __construct(
        public ?string $firstName,
        public ?string $last_name
    )
    {
    }
}
