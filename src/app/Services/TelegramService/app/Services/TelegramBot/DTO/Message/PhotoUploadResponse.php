<?php

namespace App\Services\TelegramService\app\Services\TelegramBot\DTO\Message;

use App\Services\TelegramService\app\Services\TelegramBot\Contracts\TelegramFileResponseContract;
use App\Services\TelegramService\app\Services\TelegramBot\DTO\Audio\Audio;
use App\Services\TelegramService\app\Services\TelegramBot\DTO\Chat\Chat;
use App\Services\TelegramService\app\Services\TelegramBot\DTO\User\User;

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
