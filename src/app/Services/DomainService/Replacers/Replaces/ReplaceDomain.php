<?php

namespace App\Services\DomainService\Replacers\Replaces;

use App\Services\DomainService\Contracts\ReplaceContract;
use Closure;

class ReplaceDomain implements ReplaceContract
{

    public function handle(array $content, Closure $next)
    {
        $content[0] = str_replace('{{domain}}', $content[1], $content[0]);

        return $next($content);
    }
}
