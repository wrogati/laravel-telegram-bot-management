<?php

namespace App\Services\DomainService\Validators\Validations;

use App\Exceptions\Domain\DomainExistsException;
use App\Services\DomainService\Contracts\ValidationContracts;
use Closure;

class ValidateIfDomainExists implements ValidationContracts
{
    /**
     * @throws DomainExistsException
     */
    public function handle(mixed $content, Closure $next)
    {
        if (file_exists($content))
            throw new DomainExistsException();

        return $next($content);
    }
}
