<?php

namespace App\Services\DomainService\Contracts;

use Closure;

interface ReplaceContract
{
    public function handle(array $content, Closure $next);
}
