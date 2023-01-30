<?php

namespace App\Services\DomainService\Validators;

use App\Services\DomainService\Validators\Validations\ValidateIfControllerExists;
use App\Services\DomainService\Validators\Validations\ValidateIfDomainExists;
use App\Services\DomainService\Validators\Validations\ValidateIfDomainNotExists;
use Closure;

class ControllerValidator extends Validator
{

    public function handle(string $domainPath, string $filePath)
    {
        $this->validator
            ->send($domainPath)
            ->through([ValidateIfDomainNotExists::class])
            ->thenReturn();

        $this->validator
            ->send($filePath)
            ->through([ValidateIfControllerExists::class])
            ->thenReturn();
    }
}
