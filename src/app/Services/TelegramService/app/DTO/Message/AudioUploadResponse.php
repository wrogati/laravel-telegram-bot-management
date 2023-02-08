<?php

namespace App\Services\TelegramService\app\DTO\Message;

use App\Services\TelegramService\app\Contracts\TelegramFileResponseContract;
use App\Services\TelegramService\app\DTO\Audio\Audio;
use App\Services\TelegramService\app\DTO\Chat\Chat;
use App\Services\TelegramService\app\DTO\User\User;

class AudioUploadResponse
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
            isset($upload['audio']) ? Audio::makeFromArray($upload['audio']) : null,
        );
    }
}
