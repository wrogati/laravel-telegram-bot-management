<?php

namespace TelegramBot\User\Presentation\Controllers\Bot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use TelegramBot\User\Application\Bot\IndexBotByUserId;
use TelegramBot\User\Presentation\Requests\Bot\IndexBotByUserRequest;
use TelegramBot\User\Presentation\Resources\BotResource;

class IndexBotByUserController extends Controller
{
    public function __construct(private readonly IndexBotByUserId $action)
    {
    }

    public function __invoke(IndexBotByUserRequest $request, string $userId): AnonymousResourceCollection
    {
        $bots = $this->action->handle(array_merge($request->validated(), ['user_id' => $userId]));

        return BotResource::collection($bots);
    }
}
