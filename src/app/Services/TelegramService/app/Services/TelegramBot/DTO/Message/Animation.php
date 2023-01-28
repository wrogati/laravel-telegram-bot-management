<?php

namespace TelegramBot\Services\TelegramBot\DTO\Message;

use TelegramBot\Services\TelegramBot\DTO\Photo\PhotoSize;

class Animation
{
    public function __construct(
        public readonly string     $fileId,
        public readonly string     $fileUniqueId,
        public readonly int        $width,
        public readonly int        $height,
        public readonly int        $duration,
        public readonly ?PhotoSize $thumb,
        public readonly ?string    $fileName,
        public readonly ?string    $mimeType,
        public readonly ?int       $fileSize
    )
    {
    }

    public static function makeFromArray(array $animation): self
    {
        return new self(
            $animation['file_id'],
            $animation['file_unique_id'],
            $animation['width'],
            $animation['height'],
            $animation['duration'],
            isset($animation['thumb']) ? PhotoSize::makeFromArray($animation['thumb']) : null,
            $animation['file_name'] ?? null,
            $animation['mime_type'] ?? null,
            $animation['file_size'] ?? null,
        );
    }
}