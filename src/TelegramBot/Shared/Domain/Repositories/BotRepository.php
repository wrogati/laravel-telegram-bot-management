<?php

namespace TelegramBot\Shared\Domain\Repositories;

use App\Models\Bot;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use TelegramBot\Shared\Domain\DTO\OrdinationDTO;
use TelegramBot\User\Domain\DTO\BotStoreDTO;

interface BotRepository
{
    public function store(BotStoreDTO $dto): Bot;

    public function getBotsByUserId(string $userId, ?int $page, ?int $perPage, ?OrdinationDTO $ordination): LengthAwarePaginator;

    public function index(?int $page, ?int $perPage, ?OrdinationDTO $ordination): LengthAwarePaginator;
}
