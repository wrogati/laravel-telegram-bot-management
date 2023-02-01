<?php

namespace TelegramBot\DomainManager\Domain\Services\DomainManagerService\Validators\Validations;

use Closure;
use Illuminate\Support\Facades\Storage;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Interfaces\Validation;
use TelegramBot\DomainManager\Infrastructure\Exceptions\RequestExistException;

class ValidateRequestNotExist implements Validation
{

    /**
     * @throws RequestExistException
     */
    public function handle(mixed $validate, Closure $next)
    {
        if (Storage::disk('telegrambot')->exists($validate))
            throw new RequestExistException();

        return $next($validate);
    }
}
