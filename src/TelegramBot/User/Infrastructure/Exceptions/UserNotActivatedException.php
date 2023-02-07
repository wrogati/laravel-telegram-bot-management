<?php

namespace TelegramBot\User\Infrastructure\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class UserNotActivatedException extends UserException
{
    public function __construct()
    {
        parent::__construct(
            trans('user.not-activated'),
            Response::HTTP_UNPROCESSABLE_ENTITY
        );
    }
}
