<?php

namespace TelegramBot\Telegram\Domain\Services\Telegram\DTO\Game;

use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Message\Animation;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Message\MessageEntity;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Photo\PhotoSize;

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
