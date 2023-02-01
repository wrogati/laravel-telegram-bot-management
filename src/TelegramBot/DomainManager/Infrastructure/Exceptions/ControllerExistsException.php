<?php

namespace TelegramBot\DomainManager\Infrastructure\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class ControllerExistsException extends DomainException
{
    public function __construct()
    {
        parent::__construct(
            trans('domain.controller-exist'),
            Response::HTTP_NOT_ACCEPTABLE
        );
    }
}
