<?php

namespace TelegramBot\Auth\Infrastructure\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class InvalidCredentialsException extends AuthException
{
    public function __construct()
    {
        parent::__construct(
            trans('auth.invalid-credentials'),
            Response::HTTP_UNPROCESSABLE_ENTITY
        );
    }
}
