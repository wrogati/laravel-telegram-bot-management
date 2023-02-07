<?php

namespace App\Services\TelegramService\app\Services\TelegramBot\DTO\Photo;

class Photo
{
    public function __construct(
        public readonly string $fileId,
        public readonly string $fileUniqueId,
        public readonly int $width,
        public readonly int $height,
        public readonly ?int $fileSize
    )
    {
    }

    public static function makeFromArray(array $photo): self
    {
        return new self(
            $photo['file_id'],
            $photo['file_unique_id'],
            $photo['width'],
            $photo['height'],
            $photo['file_size'] ?? null,
        );
    }

    public static function makeMultiplesFromArray(array $photos): array
    {
        $objects = [];

        foreach ($photos as $photo) {
            $objects[] = self::makeFromArray($photo);
        }

        return $objects;
    }
}
