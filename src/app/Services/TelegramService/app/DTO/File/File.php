<?php

namespace App\Services\TelegramService\app\DTO\File;

class File
{
    public function __construct(
        public readonly string  $fileId,
        public readonly string  $fileUniqueId,
        public readonly ?int    $fileSize,
        public readonly ?string $filePath
    )
    {
    }

    public static function makeFromArray(array $file): self
    {
        return new self(
            $file['file_id'],
            $file['file_unique_id'],
            $file['file_size'] ?? null,
            $file['file_path'] ?? null,
        );
    }
}
