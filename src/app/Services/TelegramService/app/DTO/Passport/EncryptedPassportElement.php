<?php

namespace App\Services\TelegramService\app\DTO\Passport;

class EncryptedPassportElement
{
    public function __construct(
        public readonly string        $type,
        public readonly ?string       $data,
        public readonly ?string       $phoneNumber,
        public readonly ?string       $email,
        /** @var PassportFile[] $files */
        public readonly ?array        $files,
        public readonly ?PassportFile $frontSide,
        public readonly ?PassportFile $reverseSide,
        public readonly ?PassportFile $selfie,
        /** @var PassportFile[] $files */
        public readonly ?array        $translation,
        public readonly ?string       $hash
    )
    {
    }

    public static function makeFromArray(array $passport): self
    {
        return new self(
            $passport['type'],
            $passport['data'] ?? null,
            $passport['phone_number'] ?? null,
            $passport['email'] ?? null,
            isset($passport['files']) ? PassportFile::makeMultiplesFromArray($passport['files']) : null,
            isset($passport['front_side']) ? PassportFile::makeFromArray($passport['front_side']) : null,
            isset($passport['reverse_side']) ? PassportFile::makeFromArray($passport['reverse_side']) : null,
            isset($passport['selfie']) ? PassportFile::makeFromArray($passport['selfie']) : null,
            isset($passport['translation']) ? PassportFile::makeMultiplesFromArray($passport['translation']) : null,
            $passport['hash'] ?? null,
        );
    }

    public static function makeMultiplesFromArray(array $passports): array
    {
        $objects = [];

        foreach ($passports as $passport) {
            $objects[] = self::makeFromArray($passport);
        }

        return $objects;
    }
}
