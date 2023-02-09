<?php

return [
    TelegramBot\User\Domain\Repositories\UserRepository::class => TelegramBot\User\Infrastructure\Repository\UserEloquentRepository::class,
];
