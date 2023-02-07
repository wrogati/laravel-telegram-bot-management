<?php

namespace App\Services\TelegramService\app\Services\TelegramBot\Http\DTO\File;

use App\Services\TelegramService\app\Services\TelegramBot\DTO\DTO;

class Voice extends DTO
{
    public ?string $messageThreadId = null;
    public ?string $caption = null;
    public ?string $parseMode = null;
    public ?array $captionEntities = null;
    public ?int $duration = null;
    public ?bool $disableNotification = null;
    public ?bool $protectContent = null;
    public ?int $replayToMessageId = null;
    public ?bool $allowSendingWithoutReply = null;

    public function __construct(
        public readonly string $chatId,
        public readonly mixed  $voice
    )
    {
    }

    public function setMessageThreadId(string $value): self
    {
        $this->messageThreadId = $value;

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

    public function setDisableNotification(bool $value): self
    {
        $this->disableNotification = $value;

        return $this;
    }

    public function setProtectContent(bool $value): self
    {
        $this->protectContent = $value;

        return $this;
    }

    public function setReplyToMessageId(string $value): self
    {
        $this->replayToMessageId = $value;

        return $this;
    }

    public function setAllowSendingWithoutReply(bool $value): self
    {
        $this->allowSendingWithoutReply = $value;

        return $this;
    }
}
