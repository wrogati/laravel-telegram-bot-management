<?php

namespace App\Services\TelegramService\app\Services\TelegramBot\Http\DTO\Message;

use App\Services\TelegramService\app\Services\TelegramBot\DTO\DTO;

class TelegramSimpleMessage extends DTO
{
    public ?int $messageThreadId = null;
    public ?string $parseMode = null;
    public ?array $entities = null;
    public bool $disableWebPagePreview = false;
    public bool $disableNotification = false;
    public bool $protectContent = false;
    public ?int $replyToMessageId = null;
    public bool $allowSendindWithoutReply = false;

    public function __construct(
        public readonly string $chatId,
        public readonly string $text
    )
    {
    }

    public function setMessageThreadId(string $messageThreadId): self
    {
        $this->messageThreadId = $messageThreadId;

        return $this;
    }

    public function setParseMode(string $parseMode): self
    {
        $this->parseMode = $parseMode;

        return $this;
    }

    public function setEntities(array $entities): self
    {
        $this->entities = $entities;

        return $this;
    }

    public function disableWebPagePreview(): self
    {
        $this->disableWebPagePreview = true;

        return $this;
    }

    public function disableNotification(): self
    {
        $this->disableNotification = true;

        return $this;
    }

    public function protectContent(): self
    {
        $this->protectContent = true;

        return $this;
    }

    public function setReplyToMessageId(int $messageId): self
    {
        $this->replyToMessageId = $messageId;

        return $this;
    }

    public function allowSendingWithoutReply(): self
    {
        $this->allowSendindWithoutReply = true;

        return $this;
    }
}
