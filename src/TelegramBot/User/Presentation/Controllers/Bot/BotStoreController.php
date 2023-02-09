<?php

namespace TelegramBot\User\Presentation\Controllers\Bot;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use TelegramBot\User\Application\Bot\BotStore;
use TelegramBot\User\Presentation\Requests\Bot\BotStoreRequest;
use TelegramBot\User\Presentation\Resources\BotResource;

class BotStoreController extends Controller
{
    public function __construct(private readonly BotStore $store)
    {
    }

    public function __invoke(BotStoreRequest $request, string $userId): JsonResponse
    {
        $bot = $this->store->handle(array_merge($request->validated(), ['created_by' => $userId]));

        return BotResource::make($bot)
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }
}
