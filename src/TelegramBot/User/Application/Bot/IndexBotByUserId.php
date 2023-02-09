<?php

namespace TelegramBot\User\Application\Bot;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Fluent;
use TelegramBot\Shared\Domain\DTO\OrdinationDTO;
use TelegramBot\Shared\Domain\Repositories\BotRepository;

class IndexBotByUserId
{
    public function __construct(private readonly BotRepository $botRepository)
    {
    }

    public function handle(array $data): LengthAwarePaginator
    {
        $dataFluent = new Fluent($data);

        $ordination = !empty($dataFluent->get('order_by_column'))
            ? new OrdinationDTO(
                $dataFluent->get('order_by_column'),
                $dataFluent->get('order_by_direction') ?? 'asc'
            )
            : null;

        return $this->botRepository->getBotsByUserId(
            $dataFluent->get('user_id'),
            $dataFluent->get('page'),
            $dataFluent->get('per_page'),
            $ordination
        );
    }
}
