<?php

namespace TelegramBot\DomainManager\Domain\Services\DomainManagerService\Replacers\Replaces;

use Closure;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Interfaces\Replace;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Replacers\ReplacerDTO;

class ReplaceDomain implements Replace
{
    public function handle(ReplacerDTO $dto, Closure $next)
    {
        $dto->content = str_replace('{{domain}}', ucfirst($dto->replace['domain']), $dto->content);

        return $next($dto);
    }
}
