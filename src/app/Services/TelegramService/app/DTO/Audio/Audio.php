<?php

namespace App\Services\TelegramService\app\DTO\Audio;

use App\Services\TelegramService\app\Contracts\TelegramFileResponseContract;
use TelegramBot\Shared\Domain\Traits\ObjectToArray;

class Audio implements TelegramFileResponseContract
{
    use ObjectToArray;

    public function __construct(
        public readonly string $fileId,
        public readonly string $fileUniqueId,
        public readonly int $duration,
        public readonly ?string $performer,
        public readonly ?string $title,
        public readonly ?string $fileName,
        public readonly ?string $mimeType,
        public readonly ?int $fileSize
    )
    {
    }

    public static function makeFromArray(array $audio): self
    {
        return new self(
            $audio['file_id'],
            $audio['file_unique_id'],
            $audio['duration'] ?? null,
            $audio['performer'] ?? null,
            $audio['title'] ?? null,
            $audio['file_name'] ?? null,
            $audio['mime_type'] ?? null,
            $audio['file_size'] ?? null,
        );
    }
}
