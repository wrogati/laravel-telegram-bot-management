<?php

namespace TelegramBot\Telegram\Domain\Services\Telegram\DTO\Bot;

use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Chat\Chat;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Chat\ChatInviteLink;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Chat\ChatMember;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\User\User;

class ChatMemberUpdated
{
    public function __construct(
        public readonly Chat            $chat,
        public readonly User            $from,
        public readonly int             $date,
        public readonly ChatMember      $oldChatMember,
        public readonly ChatMember      $newChatMember,
        public readonly ?ChatInviteLink $inviteLink
    )
    {
    }

    public static function makeFromArray(array $chatMemberUpdated): self
    {
        return new self(
            $chatMemberUpdated['chat'] ? Chat::makeFromArray($chatMemberUpdated['chat']) : null,
            $chatMemberUpdated['from'] ? User::makeFromArray($chatMemberUpdated['from']) : null,
            $chatMemberUpdated['date'],
            $chatMemberUpdated['old_chat_member'] ? ChatMember::makeFromArray($chatMemberUpdated['old_chat_member']) : null,
            isset($chatMemberUpdated['new_chat_member']) ? ChatMember::makeFromArray($chatMemberUpdated['new_chat_member']) : null,
            isset($chatMemberUpdated['invite_link']) ? ChatInviteLink::makeFromArray($chatMemberUpdated['invite_link']) : null,
        );
    }
}
