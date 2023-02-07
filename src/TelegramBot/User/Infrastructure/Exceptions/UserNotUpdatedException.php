<?php

namespace TelegramBot\User\Infrastructure\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class UserNotUpdatedException extends UserException
{
    public function __construct()
    {
        parent::__construct(
            trans('user.not-updated'),
            Response::HTTP_UNPROCESSABLE_ENTITY
        );
    }
}
