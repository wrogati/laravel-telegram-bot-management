<?php

namespace TelegramBot\Telegram\Domain\Services\Telegram\DTO\Message;

use TelegramBot\Telegram\Domain\Services\Telegram\Contracts\TelegramFileResponseContract;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Audio\Audio;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Chat\Chat;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\User\User;

class PhotoUploadResponse
{
    public function __construct(
        public string                       $messageId,
        public User                         $from,
        public Chat                         $chat,
        public int                          $date,
        public TelegramFileResponseContract $file
    )
    {
    }

    public static function makeFromArray(array $upload): self
    {
        return new self(
            $upload['message_id'],
            isset($upload['from']) ? User::makeFromArray($upload['from']) : null,
            isset($upload['chat']) ? Chat::makeFromArray($upload['chat']) : null,
            $upload['date'],
            isset($upload['audio']) ? Audio::makeFromArray($upload['photo']) : null,
        );
    }
}
