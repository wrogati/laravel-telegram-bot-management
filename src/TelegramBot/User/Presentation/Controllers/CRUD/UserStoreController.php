<?php

namespace TelegramBot\User\Presentation\Controllers\CRUD;

use Illuminate\Routing\Controller;
use TelegramBot\User\Application\Actions\Store;
use TelegramBot\User\Presentation\Requests\UserStoreRequest;
use TelegramBot\User\Presentation\Resources\UserResource;

class UserStoreController extends Controller
{
    public function __construct(private readonly Store $action)
    {
    }

    public function __invoke(UserStoreRequest $request): UserResource
    {
        return UserResource::make($this->action->handle($request->validated()));
    }
}
