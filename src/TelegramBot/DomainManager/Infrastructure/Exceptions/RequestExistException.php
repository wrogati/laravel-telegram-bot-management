<?php

namespace TelegramBot\DomainManager\Infrastructure\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class RequestExistException extends DomainException
{
    public function __construct()
    {
        parent::__construct(
            trans('domain.request-exist'),
            Response::HTTP_NOT_ACCEPTABLE
        );
    }
}
