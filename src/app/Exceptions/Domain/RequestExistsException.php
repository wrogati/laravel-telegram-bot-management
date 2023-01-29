<?php

namespace App\Exceptions\Domain;

use Symfony\Component\HttpFoundation\Response;

class RequestExistsException extends DomainException
{
    public function __construct()
    {
        parent::__construct(
            trans('domain.request-exists'),
            Response::HTTP_NOT_ACCEPTABLE
        );
    }
}
