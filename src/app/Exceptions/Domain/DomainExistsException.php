<?php

namespace App\Exceptions\Domain;

use Symfony\Component\HttpFoundation\Response;

class DomainExistsException extends DomainException
{
    public function __construct()
    {
        parent::__construct(
            trans('domain.exists'),
            Response::HTTP_NOT_ACCEPTABLE
        );
    }
}
