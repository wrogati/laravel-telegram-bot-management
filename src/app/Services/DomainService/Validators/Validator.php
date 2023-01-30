<?php

namespace App\Services\DomainService\Validators;

use App\Services\DomainService\Contracts\ValidationContract;
use Illuminate\Pipeline\Pipeline;

abstract class Validator
{
    protected Pipeline $validator;

    public function __construct()
    {
        $this->validator = app(Pipeline::class);
    }
}
