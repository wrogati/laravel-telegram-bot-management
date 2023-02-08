<?php

namespace App\Services\TelegramService\app\DTO\Photo;

use TelegramBot\Shared\Domain\Traits\ObjectToArray;

class PhotoSize
{
    use ObjectToArray;

    public function __construct(
        public readonly string $fileId,
        public readonly string $fileUniqueId,
        public readonly int $width,
        public readonly int $height,
        public readonly ?int $fileSize
    )
    {
    }

    public static function makeFromArray(array $photSize): self
    {
        return new self(
            $photSize['file_id'],
            $photSize['file_unique_id'],
            $photSize['width'],
            $photSize['height'],
            $photSize['file_size'] ?? null,
        );
    }

    public static function makeMultipleFromArray(array $photosSize): array
    {
        $objects = [];

        foreach ($photosSize as $photoSize) {
            $objects[] = self::makeFromArray($photoSize);
        }

        return $objects;
    }
}
