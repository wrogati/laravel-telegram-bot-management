<?php

namespace App\Services\TelegramService\app\DTO\Contact;

use TelegramBot\Shared\Domain\Traits\ObjectToArray;

class Contact
{
    use ObjectToArray;

    public function __construct(
        public readonly string  $phoneNumber,
        public readonly string  $firstName,
        public readonly ?string $lastName,
        public readonly ?int    $userId,
        public readonly string  $vcard
    )
    {
    }

    public static function makeFromArray(array $contact): self
    {
        return new self(
            $contact['phone_number'],
            $contact['first_name'],
            $contact['last_name'] ?? null,
            $contact['user_id'] ?? null,
            $contact['vcard'] ?? null,
        );
    }
}
