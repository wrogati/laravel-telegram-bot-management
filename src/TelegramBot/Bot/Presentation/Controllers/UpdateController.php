<?php

namespace TelegramBot\Bot\Presentation\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use TelegramBot\Bot\Application\Update;
use TelegramBot\Bot\Infrastructure\Exceptions\BotNotUpdatedException;
use TelegramBot\Bot\Presentation\Requests\UpdateRequest;

class UpdateController extends Controller
{
    public function __construct(private readonly Update $update)
    {
    }

    /**
     * @throws BotNotUpdatedException
     */
    public function __invoke(UpdateRequest $request, string $botId): Response
    {
        $this->update->handle(array_merge($request->validated(), ['bot_id' => $botId]));

        return response()->noContent();
    }
}
