<?php

namespace TelegramBot\Services\TelegramBot\DTO\Audio;

use TelegramBot\Services\TelegramBot\DTO\Photo\PhotoSize;

class Voice
{
    public function __construct(
        public readonly string  $fileId,
        public readonly string  $fileUniqueId,
        public readonly int     $duration,
        public readonly ?string $mimeType,
        public readonly ?int    $fileSize
    )
    {
    }

    public static function makeFromArray(array $videoNote): self
    {
        return new self(
            $videoNote['file_id'],
            $videoNote['file_unique_id'],
            $videoNote['duration'],
            $videoNote['mime_type'] ?? null,
            $videoNote['file_size'] ?? null,
        );
    }
}