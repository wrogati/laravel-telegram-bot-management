<?php

return [
    TelegramBot\User\Domain\Repository\UserRepository::class => TelegramBot\User\Infrastructure\Repository\UserEloquentRepository::class,
];
