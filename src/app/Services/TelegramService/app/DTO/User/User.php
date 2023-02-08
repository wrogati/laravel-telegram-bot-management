<?php

namespace App\Services\TelegramService\app\DTO\User;

use TelegramBot\Shared\Domain\Traits\ObjectToArray;

/**
 * @see https://core.telegram.org/bots/api#user
 */
class User
{
    use ObjectToArray;

    public function __construct(
        public readonly int    $id,
        public readonly bool $isBot,
        public readonly string $firstName,
        public readonly ?string $lastName,
        public readonly ?string $username,
        public readonly ?string $languageCode,
        public readonly ?bool $isPremium,
        public readonly ?bool $addedToAttachmentMenu,
        public readonly ?bool $canJoinGroups,
        public readonly ?bool $canReadAllGroupMessages,
        public readonly ?bool $supportsInlineQueries
    )
    {
    }

    public static function makeFromArray(array $user): self
    {
        return new self(
            $user['id'],
            $user['is_bot'],
            $user['first_name'],
            $user['last_name'] ?? null,
            $user['username'] ?? null,
            $user['language_code'] ?? null,
            $user['is_premium'] ?? null,
            $user['added_to_attachment_menu'] ?? null,
            $user['can_join_groups'] ?? null,
            $user['can_read_all_group_messages'] ?? null,
            $user['supports_inline_queries'] ?? null,
        );
    }

    public static function makeMultiplesFromArray(array $users): array
    {
        $users = [];

        foreach ($users as $user) {
            $user[] = self::makeFromArray($user);
        }

        return $users;
    }
}
