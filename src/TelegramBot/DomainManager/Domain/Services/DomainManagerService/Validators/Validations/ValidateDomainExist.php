<?php

namespace TelegramBot\DomainManager\Domain\Services\DomainManagerService\Validators\Validations;

use Closure;
use Illuminate\Support\Facades\Storage;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Interfaces\Validation;
use TelegramBot\DomainManager\Infrastructure\Exceptions\DomainNotExistException;

class ValidateDomainExist implements Validation
{

    /**
     * @throws DomainNotExistException
     */
    public function handle(mixed $validate, Closure $next)
    {
        if (!Storage::disk('telegrambot')->exists($validate))
            throw new DomainNotExistException();

        return $next($validate);
    }
}
