<?php

return [
    \TelegramBot\Shared\Domain\Repositories\UserRepository::class => \TelegramBot\Shared\Infrastructure\Repositories\UserEloquentRepository::class,
];
