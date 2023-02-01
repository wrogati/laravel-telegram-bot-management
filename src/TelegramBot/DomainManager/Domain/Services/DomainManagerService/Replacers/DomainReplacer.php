<?php

namespace TelegramBot\DomainManager\Domain\Services\DomainManagerService\Replacers;

use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Replacers\Replaces\ReplaceDomain;

class DomainReplacer extends Replacer
{
    public function handle(ReplacerDTO $dto): string
    {
        $response = $this->replacer
            ->send($dto)
            ->through([ReplaceDomain::class])
            ->thenReturn();

        return $response->content;
    }
}
