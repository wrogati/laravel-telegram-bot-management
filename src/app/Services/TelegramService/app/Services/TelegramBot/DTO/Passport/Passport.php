<?php

namespace App\Services\TelegramService\app\Services\TelegramBot\DTO\Passport;

class Passport
{
    public function __construct(
        /** @var EncryptedPassportElement[] $data */
        public readonly array                        $data,
        public readonly EncryptedCredentials $credentials
    )
    {
    }

    public static function makeFromArray(array $passport): self
    {
        return new self(
            EncryptedPassportElement::makeMultiplesFromArray($passport['data']),
            EncryptedCredentials::makeFromArray($passport['credentials'])
        );
    }
}
