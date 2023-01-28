<?php

namespace TelegramBot\Services\TelegramBot\DTO\Passport;

class EncryptedCredentials
{
    public function __construct(
        public readonly string $data,
        public readonly string $hash,
        public readonly string $secret
    )
    {
    }

    public static function makeFromArray(array $credential): self
    {
        return new self(
            $credential['data'],
            $credential['hash'],
            $credential['secret']
        );
    }
}