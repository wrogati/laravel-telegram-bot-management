<?php

namespace TelegramBot\Services\TelegramBot\DTO\Message;

use TelegramBot\Services\TelegramBot\Contracts\TelegramFileResponseContract;
use TelegramBot\Services\TelegramBot\DTO\Audio\Audio;
use TelegramBot\Services\TelegramBot\DTO\Chat\Chat;
use TelegramBot\Services\TelegramBot\DTO\User\User;

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