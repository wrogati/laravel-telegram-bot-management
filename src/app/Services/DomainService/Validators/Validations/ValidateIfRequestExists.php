<?php

namespace App\Services\DomainService\Validators\Validations;

use App\Exceptions\Domain\RequestExistsException;
use App\Services\DomainService\Contracts\ValidationContract;
use Closure;

class ValidateIfRequestExists implements ValidationContract
{

    /**
     * @throws RequestExistsException
     */
    public function handle(mixed $content, Closure $next)
    {
        if (file_exists($content))
            throw new RequestExistsException();

        return $next($content);
    }
}
