<?php

namespace TelegramBot\User\Presentation\Controllers\CRUD;

use Illuminate\Routing\Controller;
use TelegramBot\User\Application\Actions\Show;
use TelegramBot\User\Presentation\Resources\UserResource;

class UserShowController extends Controller
{
    public function __construct(private readonly Show $action)
    {
    }

    public function __invoke(string $userId): UserResource
    {
        return UserResource::make($this->action->handle($userId));
    }
}
