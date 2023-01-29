<?php

namespace App\Services\DomainService\Replacers\Replaces;

use App\Services\DomainService\Contracts\ReplaceContract;
use Closure;

class ReplaceDomainName implements ReplaceContract
{

    public function handle(array $content, Closure $next)
    {
        $content[0] = str_replace('{{domainName}}', camelCaseToPointCase($content[1]), $content[0]);

        return $next($content);
    }
}
