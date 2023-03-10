<?php

namespace App\Services\TelegramService\app\Http\DTO\File\MediaGroup;

use App\Services\TelegramService\app\DTO\DTO;

class MediaGroup extends DTO
{
    public ?int $messageThreadId = null;
    public ?bool $disableNotification = null;
    public ?bool $protectContent = null;
    public ?int $replyMessageId = null;
    public ?bool $allowSendingWithoutReply = null;

    public function __construct(
        public readonly string $chatId,
        public readonly array  $media
    )
    {
    }

    public function setMessageThreadId(string $value): self
    {
        $this->messageThreadId = $value;

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

    public function setReplyMessageId(int $value): self
    {
        $this->replyMessageId = $value;

        return $this;
    }

    public function setAllowSendingWithoutReply(bool $value): self
    {
        $this->allowSendingWithoutReply = $value;

        return $this;
    }
}
