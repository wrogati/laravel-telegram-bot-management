<?php

namespace App\Services\TelegramService\app\Services\TelegramBot\DTO\Game;

use App\Services\TelegramService\app\Services\TelegramBot\DTO\Message\Animation;
use App\Services\TelegramService\app\Services\TelegramBot\DTO\Message\MessageEntity;
use App\Services\TelegramService\app\Services\TelegramBot\DTO\Photo\PhotoSize;

class Game
{
    public function __construct(
        public readonly string            $title,
        public readonly string            $description,
        /** @var PhotoSize[] $photos */
        public readonly ?array            $photos,
        public readonly ?string           $text,
        /** @var MessageEntity[] $textEntities */
        public readonly ?array            $textEntities,
        public readonly Animation $animation
    )
    {
    }

    public static function makeFromArray(array $game): self
    {
        return new self(
            $game['title'],
            $game['description'],
            isset($game['photo']) ? PhotoSize::makeMultipleFromArray($game['photo']) : null,
            $game['text'] ?? null,
            isset($game['text_entities']) ? MessageEntity::makeMultiplesFromArray($game['text_entities']) : null,
            isset($game['animation']) ? Animation::makeFromArray($game['animation']) : null,
        );
    }
}
