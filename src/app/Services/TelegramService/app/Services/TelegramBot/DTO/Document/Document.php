<?php

namespace TelegramBot\Services\TelegramBot\DTO\Document;

use TelegramBot\Services\TelegramBot\DTO\Photo\PhotoSize;

class Document
{
    public function __construct(
        public readonly string     $fileId,
        public readonly string     $fileUniqueId,
        public readonly ?PhotoSize $thumb,
        public readonly ?string    $fileName,
        public readonly ?string    $mimeType,
        public readonly ?int       $fileSize
    )
    {
    }

    public static function makeFromArray(array $document): self
    {
        return new self(
            $document['file_id'],
            $document['file_unique_id'],
            isset($document['thumb']) ? PhotoSize::makeFromArray($document['thumb']) : null,
            $document['file_name'] ?? null,
            $document['mime_type'] ?? null,
            $document['file_size'] ?? null,
        );
    }
}