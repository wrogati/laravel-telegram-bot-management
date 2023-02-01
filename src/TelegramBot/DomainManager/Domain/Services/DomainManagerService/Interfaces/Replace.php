<?php

namespace TelegramBot\DomainManager\Domain\Services\DomainManagerService\Interfaces;

use Closure;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Replacers\ReplacerDTO;

interface Replace
{
    public function handle(ReplacerDTO $dto, Closure $next);
}
