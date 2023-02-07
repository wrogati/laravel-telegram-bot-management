<?php

namespace App\Services\TelegramService\app\Services\TelegramBot\Http\DTO\File;

use App\Services\TelegramService\app\Services\TelegramBot\DTO\DTO;

/**
 * @see https://core.telegram.org/bots/api#sendaudio
 */
class Photo extends DTO
{
    public ?int $messageThreadId = null;
    public ?string $caption = null;
    public ?string $parseMode = null;
    public ?array $captionEntities = null;
    public ?bool $hasSpoiler = null;
    public ?bool $disableNotification = null;
    public ?bool $protectContent = null;
    public ?int $replyToMessageId = null;
    public ?bool $allowSendingWithoutReply = null;

    public function __construct(
        public readonly string $chatId,
        public readonly mixed $photo
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

    public function setCaptionEntities(array $captionEntities): self
    {
        $this->captionEntities = $captionEntities;

        return $this;
    }

    public function hasSpoiler(bool $hasSpoiler): self
    {
        $this->hasSpoiler = $hasSpoiler;

        return $this;
    }

    public function disableNotification(bool $disableNotification): self
    {
        $this->disableNotification = $disableNotification;

        return $this;
    }

    public function setProtectContent(bool $protectContent): self
    {
        $this->protectContent = $protectContent;

        return $this;
    }

    public function setReplyToMessageId(string $messageId): self
    {
        $this->replyToMessageId = $messageId;

        return $this;
    }

    public function setAllowSendingWithoutReply(bool $allowSendingWithoutReply): self
    {
        $this->allowSendingWithoutReply = $allowSendingWithoutReply;

        return $this;
    }
}
