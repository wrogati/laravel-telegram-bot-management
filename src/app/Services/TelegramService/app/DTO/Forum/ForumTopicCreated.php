<?php

namespace App\Services\TelegramService\app\DTO\Forum;

use TelegramBot\Shared\Domain\Traits\ObjectToArray;

class ForumTopicCreated
{
    use ObjectToArray;

    public function __construct(
        public readonly string $name,
        public readonly int $iconColor,
        public readonly ?string $iconCustomEmojiId
    )
    {
    }

    public static function makeFromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['icon_color'],
            $data['icon_custom_emoji_id']
        );
    }
}
