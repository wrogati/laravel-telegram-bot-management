<?php

namespace App\Services\TelegramService\app\Services\TelegramBot\DTO\Sticker;

use App\Services\TelegramService\app\Services\TelegramBot\DTO\File\File;
use App\Services\TelegramService\app\Services\TelegramBot\DTO\File\MaskPosition;
use App\Services\TelegramService\app\Services\TelegramBot\DTO\Message\Animation;
use App\Services\TelegramService\app\Services\TelegramBot\DTO\Photo\PhotoSize;

class Sticker
{
    public function __construct(
        public readonly string        $fileId,
        public readonly string        $fileUniqueId,
        public readonly string        $type,
        public readonly int           $width,
        public readonly int           $height,
        public readonly bool          $isAnimated,
        public readonly bool          $isVideo,
        public readonly ?PhotoSize    $thumb,
        public readonly ?string       $emoji,
        public readonly ?string       $setName,
        public readonly ?File         $premiumAnimation,
        public readonly ?MaskPosition $maskPosition,
        public readonly ?string       $customEmojiId,
        public readonly ?int          $fileSize
    )
    {
    }

    public static function makeFromArray(array $sticker): self
    {
        return new self(
            $sticker['file_id'],
            $sticker['file_unique_id'],
            $sticker['type'],
            $sticker['width'],
            $sticker['height'],
            $sticker['is_animated'],
            $sticker['is_video'],
            isset($sticker['thumb']) ? PhotoSize::makeFromArray($sticker['thumb']) : null,
            $sticker['emoji'] ?? null,
            $sticker['set_name'] ?? null,
            isset($sticker['premium_animation']) ? Animation::makeFromArray($sticker['premium_animation']) : null,
            isset($sticker['mask_position']) ? MaskPosition::makeFromArray($sticker['mask_position']) : null,
            $sticker['custom_emoji_id'] ?? null,
            $sticker['file_size'] ?? null,
        );
    }
}
