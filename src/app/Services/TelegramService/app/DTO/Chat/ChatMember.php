<?php

namespace App\Services\TelegramService\app\DTO\Chat;

use App\Services\TelegramService\app\DTO\User\User;

class ChatMember
{
    public function __construct(
        public readonly ?Chat   $chat,
        public readonly ?User   $user,
        public readonly ?int    $date,
        public readonly ?User   $oldChatMember,
        public readonly ?string $status
    )
    {
    }

    public static function makeFromArray(array $chatMember): self
    {
        return new self(
            isset($chatMember['chat']) ? Chat::makeFromArray($chatMember['chat']) : null,
            isset($chatMember['user']) ? User::makeFromArray($chatMember['user']) : null,
            $chatMember['date'] ?? null,
            isset($chatMember['old_chat_member']) ? User::makeFromArray($chatMember['old_chat_member']) : null,
            $chatMember['status'] ?? null,
        );
    }
}
