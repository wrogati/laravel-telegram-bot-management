<?php

namespace TelegramBot\Services\TelegramBot\Http\DTO\File;

use TelegramBot\Services\TelegramBot\DTO\DTO;

/**
 * @see https://core.telegram.org/bots/api#sendaudio
 */
class Audio extends DTO
{
    public ?int $messageThreadId = null;
    public ?string $caption = null;
    public ?string $parseMode = null;
    public ?array $captionEntities = null;
    public ?int $duration = null;
    public ?string $performer = null;
    public ?string $title = null;
    public mixed $thumb = null;
    
    public function __construct(
        public readonly string $chatId,
        public readonly mixed $audio
    )
    {
    }

    public function setMessageThreadId(int $messageThreadId): self
    {
        $this->messageThreadId = $messageThreadId;
        
        return $this;
    }

    public function setCaption(string $caption): self
    {
        $this->caption = $caption;
        
        return $this;
    }

    public function setParseMode(string $parseMode): self
    {
        $this->parseMode = $parseMode;
        
        return $this;
    }

    //TODO:: handle with caption_entities

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function setPerformer(string $performer): self
    {
        $this->performer = $performer;

        return $this;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function setThumb(mixed $thumb): self
    {
        $this->thumb = $thumb;

        return $this;
    }
}