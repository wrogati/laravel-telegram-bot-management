<?php

namespace TelegramBot\Bot\Presentation\Controllers;

use App\Http\Controllers\Controller;
use TelegramBot\Bot\Application\Show;
use TelegramBot\User\Presentation\Resources\BotResource;

class ShowController extends Controller
{
    public function __construct(private readonly Show $show)
    {
    }

    public function __invoke(string $botId): BotResource
    {
        return BotResource::make($this->show->handle($botId));
    }
}
