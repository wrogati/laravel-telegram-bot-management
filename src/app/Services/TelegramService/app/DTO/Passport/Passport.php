<?php

namespace App\Services\TelegramService\app\DTO\Passport;

use TelegramBot\Shared\Domain\Traits\ObjectToArray;

class Passport
{
    use ObjectToArray;

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
