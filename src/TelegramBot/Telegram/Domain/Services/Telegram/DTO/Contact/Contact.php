<?php

namespace TelegramBot\Telegram\Domain\Services\Telegram\DTO\Contact;

class Contact
{
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
