<?php

namespace App\Exceptions\Domain;

use Symfony\Component\HttpFoundation\Response;

class ControllerExistsException extends DomainException
{
    public function __construct()
    {
        parent::__construct(
            trans('domain.controller-exists'),
            Response::HTTP_NOT_ACCEPTABLE
        );
    }
}