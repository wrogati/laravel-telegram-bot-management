<?php

namespace TelegramBot\DomainManager\Domain\Services\DomainManagerService\Interfaces;

use Closure;

interface Validation
{
    public function handle(mixed $validate, Closure $next);
}
