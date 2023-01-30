<?php

namespace App\Services\DomainService\Replacers;

use App\Services\DomainService\Replacers\Replaces\ReplaceDomain;
use App\Services\DomainService\Replacers\Replaces\ReplaceFileName;
use Illuminate\Pipeline\Pipeline;

class ControllerReplacer
{
    public function handle(string $content, string $domainName, string $fileName): string
    {
        $validator = app(Pipeline::class);

        $content = $validator->send([$content, $domainName])
            ->through([ReplaceDomain::class])
            ->thenReturn();

        $content = $validator->send([$content, $fileName])
            ->through([ReplaceFileName::class])
            ->thenReturn();

        return $content[0][0];
    }
}
