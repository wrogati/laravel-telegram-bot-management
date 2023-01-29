<?php

namespace App\Services\DomainService\Contracts;

use Closure;

interface ValidationContracts
{
    public function handle(mixed $content, Closure $next);
}
