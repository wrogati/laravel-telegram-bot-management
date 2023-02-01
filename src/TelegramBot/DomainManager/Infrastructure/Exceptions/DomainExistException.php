<?php

namespace TelegramBot\DomainManager\Infrastructure\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class DomainExistException extends DomainException
{
    public function __construct()
    {
        parent::__construct(
            trans('domain.exist'),
            Response::HTTP_NOT_ACCEPTABLE
        );
    }
}
