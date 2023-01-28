<?php

namespace TelegramBot\Services\TelegramBot\DTO\Forum;

class ForumTopicEdited
{
    public function __construct(
        public readonly ?string $name,
        public readonly ?string $iconCustomEmojiId
    )
    {
    }

    public static function makeFromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['icon_custom_emoji_id']
        );
    }
}