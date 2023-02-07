<?php

namespace TelegramBot\User\Presentation\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use TelegramBot\User\Application\Actions\Activate;
use TelegramBot\User\Infrastructure\Exceptions\UserNotActivatedException;

class ActiveUserController extends Controller
{
    public function __construct(private readonly Activate $action)
    {
    }

    /**
     * @throws UserNotActivatedException
     */
    public function __invoke(string $userId): Response
    {
        $this->action->handle($userId);

        return response()->noContent();
    }
}
