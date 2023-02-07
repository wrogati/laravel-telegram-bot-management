<?php

namespace TelegramBot\Telegram\Domain\Services\Telegram\DTO\Chat;

/**
 * @see https://core.telegram.org/bots/api#chat
 */
class Chat
{
    public function __construct(
        public string  $id,
        public string  $type,
        public ?string $title,
        public ?string $username,
        public ?string $firstName,
        public ?string $lastName,
        public ?bool   $isForum,
        //TODO:: handle with photo
        public ?array  $activeUsernames,
        public ?string $emojiStatusCustomEmojiId,
        public ?string $bio,
        public ?bool   $hasPrivateForwards,
        public ?bool   $hasRestrictedVoiceAndVideoMessages,
        public ?bool   $joinToSendMessages,
        public ?bool   $joinByRequest,
        public ?string $description,
        public ?string $inviteLink,
        //TODO:: handle with pinned_message
        //TODO:: handle with permissions
        public ?int    $slowModeDelay,
        public ?int    $messageAutoDeleteTime,
        public ?bool   $hasAggressiveAntiSpamEnabled,
        public ?bool   $hasHiddenMembers,
        public ?bool   $hasProtectedContent,
        public ?string $stickerSetName,
        public ?bool   $canSetStickerSet,
        public ?int    $linkedChatId,
        public ?bool   $allMembersAreAdministrators
    )
    {
    }

    public static function makeFromArray(array $chat): self
    {
        return new self(
            $chat['id'],
            $chat['type'],
            $chat['title'] ?? null,
            $chat['username'] ?? null,
            $chat['first_name'] ?? null,
            $chat['last_name'] ?? null,
            $chat['is_forum'] ?? null,
            $chat['active_usernames'] ?? null,
            $chat['emoji_status_custom_emoji_id'] ?? null,
            $chat['bio'] ?? null,
            $chat['has_private_forwards'] ?? null,
            $chat['has_restricted_voice_and_video_messages'] ?? null,
            $chat['join_to_send_messages'] ?? null,
            $chat['join_by_request'] ?? null,
            $chat['description'] ?? null,
            $chat['invite_link'] ?? null,
            $chat['slow_mode_delay'] ?? null,
            $chat['message_auto_delete_time'] ?? null,
            $chat['has_aggressive_anti_spam_enabled'] ?? null,
            $chat['has_hidden_members'] ?? null,
            $chat['has_protected_content'] ?? null,
            $chat['sticker_set_name'] ?? null,
            $chat['can_set_sticker_set'] ?? null,
            $chat['linked_chat_id'] ?? null,
            $chat['all_members_are_administrators'] ?? null
        );
    }
}
