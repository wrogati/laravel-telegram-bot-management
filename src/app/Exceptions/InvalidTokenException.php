<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class InvalidTokenException extends \Exception
{
    public function __construct()
    {
        parent::__construct(
            trans('domain.general.invalid-token'),
            Response::HTTP_UNPROCESSABLE_ENTITY
        );
    }
}
