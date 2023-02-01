<?php

namespace TelegramBot\DomainManager\Domain\Services\DomainManagerService\Validators;

use Illuminate\Pipeline\Pipeline;

abstract class Validator
{
    protected Pipeline $validator;

    public function __construct()
    {
        $this->validator = app(Pipeline::class);
    }

    abstract public function handle(ValidatorDTO $dto);
}
