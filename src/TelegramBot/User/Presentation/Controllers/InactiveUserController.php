<?php

namespace TelegramBot\User\Presentation\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use TelegramBot\User\Application\Actions\Inactivate;
use TelegramBot\User\Infrastructure\Exceptions\UserNotInactivatedException;

class InactiveUserController extends Controller
{
    public function __construct(private readonly Inactivate $action)
    {
    }

    /**
     * @throws UserNotInactivatedException
     */
    public function __invoke(string $userId): Response
    {
        $this->action->handle($userId);

        return response()->noContent();
    }
}
