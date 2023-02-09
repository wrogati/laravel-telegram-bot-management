<?php

namespace TelegramBot\Shared\Infrastructure\Repositories;

use App\Models\Bot;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Jenssegers\Mongodb\Eloquent\Builder;
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
                fn (Builder$query) => $query->orderBy($ordination->column, $ordination->direction)
            )
            ->paginate(perPage: $perPage ?? 10, page: $page ?? 1);
    }
}
