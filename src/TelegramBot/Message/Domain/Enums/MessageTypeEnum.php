<?php

namespace TelegramBot\Message\Domain\Enums;

enum MessageTypeEnum
{
    case SIMPLE;
    case AUDIO;
    case VIDEO;
    case MEDIA_GROUP;

    public function description(): string
    {
        return match ($this) {
            self::SIMPLE => 'text',
            self::AUDIO => 'audio',
            self::VIDEO => 'video',
            self::MEDIA_GROUP => 'media_group'
        };
    }
}
