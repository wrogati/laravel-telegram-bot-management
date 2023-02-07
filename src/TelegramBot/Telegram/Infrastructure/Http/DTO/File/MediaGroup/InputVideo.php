<?php

namespace TelegramBot\Telegram\Infrastructure\Http\DTO\File\MediaGroup;

use TelegramBot\Telegram\Domain\Services\Telegram\DTO\DTO;

class InputVideo extends DTO
{
    public mixed $thumb = null;
    public ?string $caption = null;
    public ?string $parseMode = null;
    public ?array $captionEntities = null;
    public ?int $width = null;
    public ?int $heigth = null;
    public ?int $duration = null;
    public ?bool $supportsStreaming = null;
    public ?bool $hasSpoiler = null;

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

    public function setWidth(int $value): self
    {
        $this->width = $value;

        return $this;
    }

    public function setHeight(int $value): self
    {
        $this->heigth = $value;

        return $this;
    }

    public function setDuration(int $value): self
    {
        $this->duration = $value;

        return $this;
    }

    public function setSupportsStreaming(bool $value): self
    {
        $this->supportsStreaming = $value;

        return $this;
    }

    public function setHasSpoiler(bool $value): self
    {
        $this->hasSpoiler = $value;

        return $this;
    }
}
