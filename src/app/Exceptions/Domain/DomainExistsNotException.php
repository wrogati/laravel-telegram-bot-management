<?php

namespace App\Exceptions\Domain;

use Symfony\Component\HttpFoundation\Response;

class DomainExistsNotException extends DomainException
{
    public function __construct()
    {
        parent::__construct(
            trans('domain.not-exists'),
            Response::HTTP_NOT_ACCEPTABLE
        );
    }
}
