<?php

namespace TelegramBot\User\Presentation\Controllers\CRUD;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use TelegramBot\User\Application\Actions\Update;
use TelegramBot\User\Domain\Exceptions\UserNotUpdatedException;
use TelegramBot\User\Presentation\Requests\UserUpdateRequest;

class UserUpdateController extends Controller
{
    public function __construct(private readonly Update $action)
    {
    }

    /**
     * @throws UserNotUpdatedException
     */
    public function __invoke(UserUpdateRequest $request, string $userId): Response
    {
        $this->action->handle($userId, $request->validated());

        return response()->noContent();
    }
}
