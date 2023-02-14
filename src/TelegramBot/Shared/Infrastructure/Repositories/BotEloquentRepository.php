<?php

namespace TelegramBot\Shared\Infrastructure\Repositories;

use App\Models\Bot;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Jenssegers\Mongodb\Eloquent\Builder;
use MongoDB\BSON\ObjectId;
use TelegramBot\Bot\Domain\DTO\BotUpdateDTO;
use TelegramBot\Shared\Domain\DTO\OrdinationDTO;
use TelegramBot\Shared\Domain\Repositories\BotRepository;
use TelegramBot\User\Domain\DTO\BotStoreDTO;

class BotEloquentRepository implements BotRepository
{
    public function __construct(private readonly Bot $model)
    {
    }

    public function store(BotStoreDTO $dto): Bot
    {
        return $this->model
            ->newQuery()
            ->create($dto->toArray(true));
    }

    public function getBotsByUserId(string $userId, ?int $page, ?int $perPage, ?OrdinationDTO $ordination): LengthAwarePaginator
    {
        return $this->model
            ->newQuery()
            ->where('created_by', $userId)
            ->when(
                !is_null($ordination),
                fn (Builder $query) => $query->orderBy($ordination->column, $ordination->direction)
            )
            ->paginate(perPage: $perPage ?? 10, page: $page ?? 1);
    }

    public function index(?int $page, ?int $perPage, ?OrdinationDTO $ordination): LengthAwarePaginator
    {
        return $this->model
            ->newQuery()
            ->when(
                !is_null($ordination),
                fn (Builder $query) => $query->orderBy($ordination->column, $ordination->direction)
            )
            ->paginate(perPage: $perPage ?? 10, page: $page ?? 1);
    }

    public function getById(string $botId): Bot
    {
        return $this->model
            ->newQuery()
            ->findOrFail(new ObjectId($botId));
    }

    public function update(Bot $bot, BotUpdateDTO $dto): bool
    {
        return $bot->update($dto->toArray());
    }
}
