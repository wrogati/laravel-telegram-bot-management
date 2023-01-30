<?php

namespace App\Services\DomainService\Validators\Validations;

use App\Exceptions\Domain\DomainExistsNotException;
use App\Services\DomainService\Contracts\ValidationContract;
use Closure;

class ValidateIfDomainNotExists implements ValidationContract
{
    /**
     * @throws DomainExistsNotException
     */
    public function handle(mixed $content, Closure $next)
    {
        if (!file_exists($content))
            throw new DomainExistsNotException();

        return $next($content);
    }
}
