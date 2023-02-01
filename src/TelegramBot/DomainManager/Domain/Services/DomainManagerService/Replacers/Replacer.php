<?php

namespace TelegramBot\DomainManager\Domain\Services\DomainManagerService\Replacers;

use Illuminate\Pipeline\Pipeline;

abstract class Replacer
{
    protected Pipeline $replacer;

    public function __construct()
    {
        $this->replacer = app(Pipeline::class);
    }

    abstract public function handle(ReplacerDTO $dto): string;
}
