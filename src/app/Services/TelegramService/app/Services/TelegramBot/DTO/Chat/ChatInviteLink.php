<?php

namespace TelegramBot\Services\TelegramBot\DTO\Chat;

use TelegramBot\Services\TelegramBot\DTO\User\User;

class ChatInviteLink
{
    public function __construct(
        public readonly string  $inviteLink,
        public readonly User    $creator,
        public readonly bool    $createsJoinRequest,
        public readonly bool    $isPrimary,
        public readonly bool    $isRevoked,
        public readonly ?string $name,
        public readonly ?int    $expireDate,
        public readonly ?int    $memberLimit,
        public readonly ?int    $pendingJoinRequestCount
    )
    {
    }

    public static function makeFromArray(array $chatInviteLink): self
    {
        return new self(
            $chatInviteLink['invite_link'],
            $chatInviteLink['creator'],
            $chatInviteLink['creates_join_request'],
            $chatInviteLink['is_primary'],
            $chatInviteLink['is_revoked'],
            $chatInviteLink['name'] ?? null,
            $chatInviteLink['expire_date'] ?? null,
            $chatInviteLink['member_limit'] ?? null,
            $chatInviteLink['pending_join_request_count	'] ?? null,
        );
    }
}