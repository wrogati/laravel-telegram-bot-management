<?php

namespace TelegramBot\Telegram\Domain\Services\Telegram\DTO\Message;

use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Audio\Audio;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Audio\Voice;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Bot\Poll;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Chat\Chat;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Contact\Contact;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Dice\TelegramDice;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Document\Document;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Forum\ForumTopicClosed;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Forum\ForumTopicCreated;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Forum\ForumTopicEdited;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Game\Game;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Passport\Passport;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Payment\Invoice;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Payment\SuccessfulPayment;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Photo\Photo;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Photo\PhotoSize;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\ProximityAlertTriggered;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Sticker\Sticker;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\User\User;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Venue\TelegramVenue;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Video\TelegramVideoNote;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Video\Video;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Video\VideoChatEnded;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Video\VideoChatParticipantsInvited;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Video\VideoChatScheduled;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\WebAppData;

/**
 * @see https://core.telegram.org/bots/api#message
 */
class Message
{
    public function __construct(
        public readonly string                         $messageId,
        public readonly ?int                           $messageThreadId,
        public readonly ?User                          $from,
        public readonly ?Chat                          $senderChat,
        public readonly ?int                           $date,
        public readonly ?Chat                          $chat,
        public readonly ?User                          $forwardFrom,
        public readonly ?Chat                          $forwardFromChat,
        public readonly ?int                           $forwardFromMessageId,
        public readonly ?string                        $forwardSignature,
        public readonly ?string                        $forwardSenderName,
        public readonly ?int                           $forwardDate,
        public readonly ?bool                          $isTopicMessage,
        public readonly ?bool                          $isAutomaticForward,
        public readonly ?self                          $replyToMessage,
        public readonly ?User                          $viaBot,
        public readonly ?int                           $editDate,
        public readonly ?bool                          $hasProtectedContent,
        public readonly ?string                        $mediaGroupId,
        public readonly ?string            $authorSignature,
        public readonly ?string            $text,
        /** @var MessageEntity[] $entities */
        public readonly ?array             $entities,
        public readonly ?Animation         $animation,
        public readonly ?Audio             $audio,
        public readonly ?Document          $document,
        /** @var Photo[] $photos */
        public readonly ?array             $photos,
        public readonly ?Sticker           $sticker,
        public readonly ?Video             $video,
        public readonly ?TelegramVideoNote $videoNote,
        public readonly ?Voice             $voice,
        public readonly ?string            $caption,
        /** @var MessageEntity[] $captionEntities */
        public readonly ?array             $captionEntities,
        public readonly ?bool              $hasMediaSpoiler,
        public readonly ?Contact           $contact,
        public readonly ?TelegramDice      $dice,
        public readonly ?Game              $game,
        public readonly ?Poll              $poll,
        public readonly ?TelegramVenue                 $venue,
        public readonly ?Location                      $location,
        /* @var User[] $newChatMembers */
        public readonly ?array                         $newChatMembers,
        public readonly ?User                          $leftChatMember,
        public readonly ?string                        $newChatTitle,
        /** @var PhotoSize[] $newChatPhoto */
        public readonly ?array                         $newChatPhoto,
        public readonly ?bool                          $deleteChatPhoto,
        public readonly ?bool                          $groupChatCreated,
        public readonly ?bool                          $supergroupChatCreated,
        public readonly ?bool                          $channelChatCreated,
        public readonly ?MessageAutoDeleteTimerChanged $messageAutoDeleteTimerChanged,
        public readonly ?int                           $migrateToChatId,
        public readonly ?int                           $migrateFromChatId,
        public readonly ?self                          $pinnedMessage,
        public readonly ?Invoice                       $invoice,
        public readonly ?SuccessfulPayment             $successfulPayment,
        public readonly ?string                        $connectedWebsite,
        public readonly mixed                          $writeAccessAllowed,
        public readonly ?Passport                      $passportData,
        public readonly ?ProximityAlertTriggered       $proximityAlertTriggered,
        public readonly ?ForumTopicCreated             $forumTopicCreated,
        public readonly ?ForumTopicEdited              $forumTopicEdited,
        public readonly ?ForumTopicClosed              $forumTopicClosed,
        public readonly ?array                         $forumTopicReopened,
        public readonly ?array                         $generalForumTopicHidden,
        public readonly ?array                         $generalForumTopicUnhidden,
        public readonly ?VideoChatScheduled            $videoChatScheduled,
        public readonly ?array                         $videoChatStarted,
        public readonly ?VideoChatEnded                $videoChatEnded,
        public readonly ?VideoChatParticipantsInvited          $videoChatParticipantsInvited,
        public readonly ?WebAppData                            $webAppData,
        public readonly ?array                                 $replyMarkup
    )
    {
    }

    public static function makeFromArray(array $data): Message
    {
        return new Message(
            $data['message_id'],
            $data['message_thread_id'] ?? null,
            isset($data['from']) ? User::makeFromArray($data['from']) : null,
            isset($data['sender_chat']) ? Chat::makeFromArray($data['sender_chat']) : null,
            $data['date'] ?? null,
            isset($data['chat']) ? Chat::makeFromArray($data['chat']) : null,
            isset($data['forward_from']) ? User::makeFromArray($data['forward_from']) : null,
            isset($data['forward_from_chat']) ? Chat::makeFromArray($data['forward_from_chat']) : null,
            $data['forward_from_message_id'] ?? null,
            $data['forward_signature'] ?? null,
            $data['forward_sender_name'] ?? null,
            $data['forward_date'] ?? null,
            $data['is_topic_message'] ?? null,
            $data['is_automatic_forward'] ?? null,
            isset($data['reply_to_message']) ? Message::makeFromArray($data['reply_to_message']) : null,
            isset($data['via_bot']) ? User::makeFromArray($data['via_bot']) : null,
            $data['edit_date'] ?? null,
            $data['has_protected_content'] ?? null,
            $data['media_group_id'] ?? null,
            $data['author_signature'] ?? null,
            $data['text'] ?? null,
            isset($data['entities']) ? MessageEntity::makeMultiplesFromArray($data['entities']) : null,
            isset($data['animation']) ? Animation::makeFromArray($data['animation']) : null,
            isset($data['audio']) ? Audio::makeFromArray($data['audio']) : null,
            isset($data['document']) ? Document::makeFromArray($data['document']) : null,
            isset($data['photo']) ? PhotoSize::makeMultipleFromArray($data['photo']) : null,
            isset($data['sticker']) ? Sticker::makeFromArray($data['sticker']) : null,
            isset($data['video']) ? Video::makeFromArray($data['video']) : null,
            isset($data['video_note']) ? TelegramVideoNote::makeFromArray($data['video_note']) : null,
            isset($data['voice']) ? Voice::makeFromArray($data['voice']) : null,
            $data['caption'] ?? null,
            isset($data['caption_entities']) ? MessageEntity::makeMultiplesFromArray($data['caption_entities']) : null,
            $data['has_media_spoiler'] ?? null,
            isset($data['contact']) ? Contact::makeFromArray($data['contatc']) : null,
            isset($data['dice']) ? TelegramDice::makeFromArray($data['dice']) : null,
            isset($data['game']) ? Game::makeFromArray($data['game']) : null,
            isset($data['poll']) ? Poll::makeFromArray($data['poll']) : null,
            isset($data['venue']) ? TelegramVenue::makeFromArray($data['venue']) : null,
            isset($data['location']) ? Location::makeFromArray($data['location']) : null,
            isset($data['new_chat_members']) ? User::makeMultiplesFromArray($data['new_chat_members']) : null,
            isset($data['left_chat_member']) ? User::makeFromArray($data['left_chat_member']) : null,
            $data['new_chat_title'] ?? null,
            isset($data['new_chat_photo']) ? PhotoSize::makeMultipleFromArray($data['new_chat_photo']) : null,
            $data['delete_chat_photo'] ?? null,
            $data['group_chat_created'] ?? null,
            $data['supergroup_chat_created'] ?? null,
            $data['channel_chat_created'] ?? null,
            isset($data['message_auto_delete_timer_changed']) ? MessageAutoDeleteTimerChanged::makeFromArray($data['message_auto_delete_timer_changed']) : null,
            $data['migrate_to_chat_id'] ?? null,
            $data['migrate_from_chat_id'] ?? null,
            isset($data['pinned_message']) ? Message::makeFromArray($data['pinned_message']) : null,
            isset($data['invoice']) ? Invoice::makeFromArray($data['invoice']) : null,
            isset($data['successful_payment']) ? SuccessfulPayment::makeFromArray($data['successful_payment']) : null,
            $data['connected_website'] ?? null,
            $data['write_access_allowed'] ?? null,
            isset($data['passport_data']) ? Passport::makeFromArray($data['passport_data']) : null,
            isset($data['proximity_alert_triggered']) ? ProximityAlertTriggered::makeFromArray($data['proximity_alert_triggered']) : null,
            isset($data['forum_topic_created']) ? ForumTopicCreated::makeFromArray($data['forum_topic_created']) : null,
            isset($data['forum_topic_edited']) ? ForumTopicEdited::makeFromArray($data['forum_topic_edited]']) : null,
            isset($data['forum_topic_closed']) ? ForumTopicClosed::makeFromArray($data['forum_topic_closed']) : null,
            $data['forum_topic_reopened'] ?? null,
            $data['general_forum_topic_hidden'] ?? null,
            $data['general_forum_topic_unhidden'] ?? null,
            isset($data['video_chat_scheduled']) ? VideoChatScheduled::makeFromArray($data['video_chat_scheduled']) : null,
            $data['video_chat_started'] ?? null,
            isset($data['video_chat_ended']) ? VideoChatEnded::makeFromArray($data['video_chat_ended']) : null,
            isset($data['video_chat_participants_invited']) ? VideoChatParticipantsInvited::makeFromArray($data['video_chat_participants_invited']) : null,
            isset($data['web_app_data']) ? WebAppData::makeFromArray($data['web_app_data']) : null,
            $data['reply_markup'] ?? null
        );
    }

    public static function makeMultiplesFromArray(array $datas): array
    {
        $objects = [];

        foreach ($datas as $data) {
            $objects[] = self::makeFromArray($data);
        }

        return $objects;
    }
}
