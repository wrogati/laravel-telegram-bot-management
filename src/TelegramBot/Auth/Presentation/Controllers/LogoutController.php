<?php

namespace TelegramBot\Auth\Presentation\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use TelegramBot\Auth\Application\Logout;
use TelegramBot\Auth\Infrastructure\Exceptions\CouldNotMakeLogoutException;
use TelegramBot\Auth\Presentation\Requests\LogoutRequest;

class LogoutController extends Controller
{
    public function __construct(private readonly Logout $logout)
    {
    }

    /**
     * @throws CouldNotMakeLogoutException
     */
    public function __invoke(LogoutRequest $request): Response
    {
        $this->logout->handle($request->header('auth-secure-token'));

        return response()->noContent();
    }
}
