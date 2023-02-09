<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class InvalidSessionException extends \Exception
{
    public function __construct()
    {
        parent::__construct(
            trans('auth.invalid-session'),
            Response::HTTP_UNPROCESSABLE_ENTITY
        );
    }
}
