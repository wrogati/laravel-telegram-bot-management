<?php

namespace TelegramBot\Services\TelegramBot\DTO\Chat;

use TelegramBot\Services\TelegramBot\DTO\User\User;

class ChatJoinRequest
{
    public function __construct(
        public readonly Chat            $chat,
        public readonly User            $from,
        public readonly int             $date,
        public readonly ?string         $bio,
        public readonly ?ChatInviteLink $inviteLink
    )
    {
    }

    public static function makeFromArray(array $chatJoinRequest): self
    {
        return new self(
            isset($chatJoinRequest['chat']) ? Chat::makeFromArray($chatJoinRequest['chat']) : null,
            isset($chatJoinRequest['from']) ? User::makeFromArray($chatJoinRequest['from']) : null,
            $chatJoinRequest['date'],
            $chatJoinRequest['bio'] ?? null, isset($chatJoinRequest['invite_link']) ? ChatInviteLink::makeFromArray($chatJoinRequest['invite_link']) : null,
        );
    }
}