<?php

namespace TelegramBot\DomainManager\Infrastructure\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class DomainNotExistException extends DomainException
{
    public function __construct()
    {
        parent::__construct(
            trans('domain.not-exist'),
            Response::HTTP_NOT_ACCEPTABLE
        );
    }
}
