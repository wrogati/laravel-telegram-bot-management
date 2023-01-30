<?php

namespace App\Services\DomainService\Validators\Validations;

use App\Exceptions\Domain\ControllerExistsException;
use App\Services\DomainService\Contracts\ValidationContract;
use Closure;

class ValidateIfControllerExists implements ValidationContract
{

    /**
     * @throws ControllerExistsException
     */
    public function handle(mixed $content, Closure $next)
    {
        if (file_exists($content))
            throw new ControllerExistsException();

        return $next($content);
    }
}
