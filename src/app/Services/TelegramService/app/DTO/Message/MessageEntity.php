<?php

namespace App\Services\TelegramService\app\DTO\Message;

use App\Services\TelegramService\app\DTO\User\User;
use TelegramBot\Shared\Domain\Traits\ObjectToArray;

class MessageEntity
{
    use ObjectToArray;

    public function __construct(
        public string  $type,
        public int     $offset,
        public int     $length,
        public ?string $url,
        public ?User   $user,
        public ?string $language,
        public ?string $customEmojiId
    )
    {
    }

    public static function makeFromArray(array $messageEntity): self
    {
        return new self(
            $messageEntity['type'],
            $messageEntity['offset'],
            $messageEntity['length'],
            $messageEntity['url'] ?? null,
            isset($messageEntity['user']) ? User::makeFromArray($messageEntity['user']) : null,
            $messageEntity['language'] ?? null,
            $messageEntity['custom_emoji_id'] ?? null,
        );
    }

    public static function makeMultiplesFromArray(array $messageEntities): array
    {
        $entities = [];

        foreach ($messageEntities as $messageEntity) {
            $entities[] = self::makeFromArray($messageEntity);
        }

        return $entities;
    }
}
