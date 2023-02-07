<?php

namespace TelegramBot\Telegram\Infrastructure\Http\DTO\File;

use TelegramBot\Telegram\Domain\Services\Telegram\DTO\DTO;

class Document extends DTO
{
    public ?int $messageThreadId = null;
    public mixed $thumb = null;
    public ?string $caption = null;
    public ?string $parseMode = null;
    public ?array $captionEntities = null;
    public ?bool $disableContentTypeDection = null;
    public ?bool $disbleNotification = null;
    public ?bool $protectContent = null;
    public ?int $replyToMessageId = null;
    public ?bool $allowSendingWithoutReply = null;

    public function __construct(
        public readonly string $chatId,
        public readonly mixed  $document
    )
    {
    }

    public function setMessageThreadId(string $value): self
    {
        $this->messageThreadId = $value;

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

    public function setDisableContentTypeDection(bool $value): self
    {
        $this->disableContentTypeDection = $value;

        return $this;
    }

    public function setDisableNotification(bool $value): self
    {
        $this->disbleNotification = $value;

        return $this;
    }

    public function setProtectContent(bool $value): self
    {
        $this->protectContent = $value;

        return $this;
    }

    public function setReplyToMessageId(string $value): self
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
