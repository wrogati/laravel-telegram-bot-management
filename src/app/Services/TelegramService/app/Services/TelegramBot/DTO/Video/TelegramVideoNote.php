<?php

namespace TelegramBot\Services\TelegramBot\DTO\Video;

use TelegramBot\Services\TelegramBot\DTO\Photo\PhotoSize;

class TelegramVideoNote
{
    public function __construct(
        public readonly string     $fileId,
        public readonly string     $fileUniqueId,
        public readonly int        $length,
        public readonly int        $duration,
        public readonly ?PhotoSize $thumb,
        public readonly ?int       $fileSize
    )
    {
    }

    public static function makeFromArray(array $videoNote): self
    {
        return new self(
            $videoNote['file_id'],
            $videoNote['file_unique_id'],
            $videoNote['length'],
            $videoNote['duration'],
            isset($videoNote['thumb']) ? PhotoSize::makeFromArray($videoNote['thumb']) : null,
            $videoNote['file_size'],
        );
    }
}