<?php

namespace App\Services\TelegramService\app\Http\DTO\File\MediaGroup;

use App\Services\TelegramService\app\DTO\DTO;

class InputoDocument extends DTO
{
    public mixed $thumb = null;
    public ?string $caption = null;
    public ?string $parseMode = null;
    public ?array $captionEntities = null;
    public ?bool $disableContentTypeDection = null;

    public function __construct(
        public readonly string $type,
        public readonly mixed $media
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

    public function setDisableContentTypeDetection(bool $value): self
    {
        $this->disableContentTypeDection = $value;

        return $this;
    }
}
