<?php

namespace TelegramBot\Services\TelegramBot\Http\DTO\File\MediaGroup;

use TelegramBot\Services\TelegramBot\DTO\DTO;

class InputPhoto extends DTO
{
    public ?string $caption = null;
    public ?string $parseMode = null;
    public ?array $captionEntities = null;
    public ?bool $hasSpoiler = null;

    public function __construct(
        public readonly string $type,
        public readonly mixed  $media
    )
    {
    }

    public function setCaption(string $value): self
    {
        $this->caption = $value;

        return $this;
    }

    public function setParseMode(string $value): self
    {
        $this->parseMode = $value;

        return $this;
    }

    public function setCaptionEntities(array $values): self
    {
        $this->captionEntities = $values;

        return $this;
    }

    public function setHasSpoiler(bool $value): self
    {
        $this->hasSpoiler = $value;

        return $this;
    }
}