<?php

namespace App\Services\DomainService\Replacers;

use Illuminate\Pipeline\Pipeline;

abstract class Replacer
{
    protected Pipeline $validator;

    public function __construct()
    {
        $this->validator = app(Pipeline::class);
    }
}
