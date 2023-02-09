<?php

namespace TelegramBot\Auth\Presentation\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use TelegramBot\Auth\Application\Login;
use TelegramBot\Auth\Presentation\Requests\LoginRequest;
use TelegramBot\Auth\Presentation\Resources\LoginResource;

class LoginController extends Controller
{
    public function __construct(private readonly Login $login)
    {
    }

    public function __invoke(LoginRequest $request): LoginResource
    {
        return LoginResource::make($this->login->handle($request->validated()));
    }
}
