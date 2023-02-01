<?php

namespace TelegramBot\DomainManager\Domain\Services\DomainManagerService\Validators\Validations;

use Closure;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Interfaces\Validation;
use TelegramBot\DomainManager\Infrastructure\Exceptions\InvalidClassNameException;

class ValidateClassName implements Validation
{

    /**
     * @throws InvalidClassNameException
     */
    public function handle(mixed $validate, Closure $next)
    {
        if (empty($validate))
            throw new InvalidClassNameException();

        return $next($validate);
    }
}
