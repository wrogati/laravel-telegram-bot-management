<?php

namespace TelegramBot\Core\Contracts;

abstract class DomainInterface
{
    private bool $disabled;

    public function __construct($disabled = null)
    {
        $this->disabled = $disabled ?? false;
    }

    public function isDisabled(): bool
    {
        return $this->disabled;
    }

    public function registerProvider(): array
    {
        return [];
    }
}
