<?php

namespace TelegramBot\Message\Presentation\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use TelegramBot\Message\Application\SendAudio;
use TelegramBot\Message\Presentation\Requests\SendAudioRequest;

class SendAudioController extends Controller
{
    public function __construct(private readonly SendAudio $sendAudio)
    {
    }

    public function __invoke(SendAudioRequest $request, string $botId): Response
    {
        $this->sendAudio->handle(array_merge($request->validated(), ['bot_id' => $botId]));

        return response()->noContent();
    }
}
