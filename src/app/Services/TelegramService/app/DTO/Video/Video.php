<?php

namespace App\Services\TelegramService\app\DTO\Video;

use App\Services\TelegramService\app\DTO\Photo\PhotoSize;
use TelegramBot\Shared\Domain\Traits\ObjectToArray;

class Video
{
    use ObjectToArray;

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

    public static function makeFromArray(array $video): self
    {
        return new self(
            $video['file_id'],
            $video['file_unique_id'],
            $video['width'],
            $video['height'],
            $video['duration'],
            isset($video['thumb']) ? PhotoSize::makeFromArray($video['thumb']) : null,
            $video['file_name'] ?? null,
            $video['mime_type'] ?? null,
            $video['file_size'] ?? null,
        );
    }
}
