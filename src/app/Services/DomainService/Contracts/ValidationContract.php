<?php

namespace App\Services\DomainService\Contracts;

use Closure;

interface ValidationContract
{
    public function handle(mixed $content, Closure $next);
}
