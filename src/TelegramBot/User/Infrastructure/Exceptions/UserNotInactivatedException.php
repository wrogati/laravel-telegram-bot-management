<?php

namespace TelegramBot\User\Infrastructure\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class UserNotInactivatedException extends UserException
{
    public function __construct()
    {
        parent::__construct(
            trans('user.not-disabled'),
            Response::HTTP_UNPROCESSABLE_ENTITY
        );
    }
}
