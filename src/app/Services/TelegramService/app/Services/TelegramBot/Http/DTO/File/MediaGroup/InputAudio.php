<?php

namespace TelegramBot\Services\TelegramBot\Http\DTO\File\MediaGroup;

use TelegramBot\Services\TelegramBot\DTO\DTO;

class InputAudio extends DTO
{
    public mixed $thumb = null;
    public ?string $caption = null;
    public ?string $parseMode = null;
    public ?array $captionEntities = null;
    public ?int $duration = null;
    public ?string $performer = null;
    public ?string $title = null;

    public function __construct(
        public readonly string $type,
        public readonly mixed  $media
    )
    {
    }

    public function setThumb(mixed $value): self
    {
        $this->thumb = $value;

        return $this;
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

    public function setDuration(int $value): self
    {
        $this->duration = $value;

        return $this;
    }

    public function setPerformer(string $value): self
    {
        $this->performer = $value;

        return $this;
    }

    public function setTitle(string $value): self
    {
        $this->title = $value;

        return $this;
    }
}