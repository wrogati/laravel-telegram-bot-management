<?php

namespace App\Services\TelegramService\app\Http\DTO\Location;

use App\Services\TelegramService\app\DTO\DTO;

class Location extends DTO
{
    public ?int $messageThreadId = null;
    public ?float $horizontalAccuracy = null;
    public ?int $livePeriod = null;
    public ?int $heading = null;
    public ?int $proximityAlertRadius = null;
    public ?bool $disableNotification = null;
    public ?bool $protectContent = null;
    public ?int $replyMessageId = null;
    public ?bool $allowSendingWithoutReply = null;

    public function __construct(
        public readonly string $chatId,
        public readonly float  $longitude,
        public readonly float  $latitude
    )
    {
    }

    public function setMessageThreadId(int $value): self
    {
        $this->messageThreadId = $value;

        return $this;
    }

    public function setHorizontalAccuracy(float $value): self
    {
        $this->horizontalAccuracy = $value;

        return $this;
    }

    public function setLivePeriod(int $value): self
    {
        $this->livePeriod = $value;

        return $this;
    }

    public function setHeading(int $value): self
    {
        $this->heading = $value;

        return $this;
    }

    public function setProximityAlertRadius(int $value): self
    {
        $this->proximityAlertRadius = $value;

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
        $this->replyMessageId = $value;

        return $this;
    }

    public function setAllowSendingWithoutReply(bool $value): self
    {
        $this->allowSendingWithoutReply = $value;

        return $this;
    }
}
