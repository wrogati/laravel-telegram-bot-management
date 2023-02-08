<?php

namespace TelegramBot\Message\Presentation\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use TelegramBot\Message\Application\SendSimpleMessage;
use TelegramBot\Message\Presentation\Requests\SendSimpleMessageRequest;

class SimpleMessageController extends Controller
{
    public function __construct(private readonly SendSimpleMessage $sendSimpleMessage)
    {
    }

    public function __invoke(SendSimpleMessageRequest $request): Response
    {
        $this->sendSimpleMessage->handle($request->validated());

        return response()->noContent();
    }
}
