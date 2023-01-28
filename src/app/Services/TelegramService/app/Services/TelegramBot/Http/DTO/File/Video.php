<?php

namespace TelegramBot\Services\TelegramBot\Http\DTO\File;

use TelegramBot\Services\TelegramBot\DTO\DTO;

class Video extends DTO
{
    public ?string $messageThreadId = null;
    public ?int $duration = null;
    public ?int $width = null;
    public ?int $height = null;
    public mixed $thumb = null;
    public ?string $caption = null;
    public ?string $parseMode = null;
    public ?array $captionEntities = null;
    public ?bool $hasSpoiler = null;
    public ?bool $supportsStreaming = null;
    public ?bool $disableNotification = null;
    public ?bool $protectContent = null;
    public ?int $replyToMessageId = null;
    public ?bool $allowSendingWithoutReply = null;

    public function __construct(
        public readonly string $chatId,
        public readonly mixed $video
    )
    {
    }

    public function setMessageThreadId(string $value): self
    {
        $this->messageThreadId = $value;

        return $this;
    }

    public function setDuration(int $value): self
    {
        $this->duration = $value;

        return $this;
    }

    public function setWidth(int $value): self
    {
        $this->width = $value;

        return $this;
    }

    public function setHeigth(int $value): self
    {
        $this->height = $value;

        return $this;
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

    public function setHasSpoiler(bool $value): self
    {
        $this->hasSpoiler = $value;

        return $this;
    }

    public function setSupportsStreaming(bool $value): self
    {
        $this->supportsStreaming = $value;

        return $this;
    }

    public function setDisableNotification(bool $value): self
    {
        $this->disableNotification = $value;

        return $this;
    }

    public function setProtectContent(bool $value): self
    {
        $this->protectContent = $value;

        return  $this;
    }

    public function setReplyToMessageId(int $value): self
    {
        $this->replyToMessageId = $value;

        return $this;
    }

    public function setAllowSendingWithoutReply(bool $value): self
    {
        $this->allowSendingWithoutReply = $value;

        return $this;
    }
}