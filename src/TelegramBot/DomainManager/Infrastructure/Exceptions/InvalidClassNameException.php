<?php

namespace TelegramBot\DomainManager\Infrastructure\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class InvalidClassNameException extends DomainException
{
    public function __construct()
    {
        parent::__construct(
            trans('domain.invalid-class-name'),
            Response::HTTP_NOT_ACCEPTABLE
        );
    }
}
