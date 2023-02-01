<?php

namespace TelegramBot\DomainManager\Domain\Services\DomainManagerService\Replacers;

use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Replacers\Replaces\ReplaceClass;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Replacers\Replaces\ReplaceDomain;

class ResourceReplacer extends Replacer
{

    public function handle(ReplacerDTO $dto): string
    {
        $response = $this->replacer
            ->send($dto)
            ->through([ReplaceDomain::class])
            ->thenReturn();

        $response = $this->replacer
            ->send($response)
            ->through([ReplaceClass::class])
            ->thenReturn();

        return $response->content;
    }
}
