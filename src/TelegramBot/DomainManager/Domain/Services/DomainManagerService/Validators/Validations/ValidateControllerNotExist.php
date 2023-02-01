<?php

namespace TelegramBot\DomainManager\Domain\Services\DomainManagerService\Validators\Validations;

use Closure;
use Illuminate\Support\Facades\Storage;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Interfaces\Validation;
use TelegramBot\DomainManager\Infrastructure\Exceptions\ControllerExistsException;

class ValidateControllerNotExist implements Validation
{

    /**
     * @throws ControllerExistsException
     */
    public function handle(mixed $validate, Closure $next)
    {
        if (Storage::disk('telegrambot')->exists($validate))
            throw new ControllerExistsException();

        return $next($validate);
    }
}
