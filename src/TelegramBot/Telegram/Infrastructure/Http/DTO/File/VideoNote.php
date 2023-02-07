<?php

namespace TelegramBot\Telegram\Infrastructure\Http\DTO\File;

use TelegramBot\Telegram\Domain\Services\Telegram\DTO\DTO;

class VideoNote extends DTO
{
    public ?string $messageThreadId = null;
    public ?int $duration = null;
    public ?int $length = null;
    public mixed $thumb = null;
    public ?bool $disableNotification = null;
    public ?bool $protectContent = null;
    public ?int $replyToMessageId = null;
    public ?bool $allowSendingWithoutReply = null;

    public function __construct(
        public readonly string $chatId,
        public readonly mixed  $videoNote
    )
    {
    }

    public function setmessageThreadId(string $value): self
    {
        $this->messageThreadId = $value;

        return $this;
    }

    public function setDuration(int $value): self
    {
        $this->duration = $value;

        return $this;
    }

    public function setLength(int $value): self
    {
        $this->length = $value;

        return $this;
    }

    public function setThumb(mixed $value): self
    {
        $this->thumb = $value;

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
