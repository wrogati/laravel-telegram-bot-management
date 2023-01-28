<?php

namespace TelegramBot\User\Presentation\Controllers;

use Illuminate\Routing\Controller;
use TelegramBot\User\Application\Actions\Store;
use TelegramBot\User\Presentation\Requests\UserStoreRequest;
use TelegramBot\User\Presentation\Resources\UserResource;

class UserCrudController extends Controller
{
    public function __construct(private readonly Store $store)
    {
    }

    public function store(UserStoreRequest $request): UserResource
    {
        return UserResource::make($this->store->handle($request->validated()));
    }
}
