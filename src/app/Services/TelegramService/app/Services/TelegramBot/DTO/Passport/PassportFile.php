<?php

namespace App\Services\TelegramService\app\Services\TelegramBot\DTO\Passport;

class PassportFile
{
    public function __construct(
        public readonly string $fileId,
        public readonly string $fileUniqueId,
        public readonly int    $fileSize,
        public readonly int    $fileDate
    )
    {
    }

    public static function makeFromArray(array $passportFile): self
    {
        return new self(
            $passportFile['file_id'],
            $passportFile['file_unique_id'],
            $passportFile['file_size'],
            $passportFile['file_data'],
        );
    }

    public static function makeMultiplesFromArray(array $passportFiles): array
    {
        $objects = [];

        foreach ($passportFiles as $passportFile) {
            $objects[] = self::makeFromArray($passportFile);
        }

        return $objects;
    }
}
