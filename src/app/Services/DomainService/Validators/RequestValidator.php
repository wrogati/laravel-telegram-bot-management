<?php

namespace App\Services\DomainService\Validators;

use App\Services\DomainService\Validators\Validations\ValidateIfDomainNotExists;
use App\Services\DomainService\Validators\Validations\ValidateIfRequestExists;
use Illuminate\Pipeline\Pipeline;

class RequestValidator
{
    public function handle(string $domain, string $filePath): void
    {
        $validator = app(Pipeline::class);

        $validator->send($domain)
            ->through([ValidateIfDomainNotExists::class])
            ->thenReturn();

        $validator->send($filePath)
            ->through([ValidateIfRequestExists::class])
            ->thenReturn();
    }
}
