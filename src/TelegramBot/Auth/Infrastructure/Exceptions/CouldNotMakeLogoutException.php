<?php

namespace TelegramBot\Auth\Infrastructure\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class CouldNotMakeLogoutException extends AuthException
{
    public function __construct()
    {
        parent::__construct(
            trans('auth.could-not-make-logout'),
            Response::HTTP_UNPROCESSABLE_ENTITY
        );
    }
}
