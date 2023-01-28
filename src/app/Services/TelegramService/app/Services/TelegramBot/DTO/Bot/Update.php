<?php

namespace App\Services\TelegramService\app\Services\TelegramBot\DTO\Bot;

use App\Services\TelegramService\app\Services\TelegramBot\DTO\Chat\ChatJoinRequest;
use App\Services\TelegramService\app\Services\TelegramBot\DTO\Message\Message;
use App\Services\TelegramService\app\Services\TelegramBot\DTO\Message\PreCheckoutQuery;
use App\Services\TelegramService\app\Services\TelegramBot\DTO\Message\ShippingQuery;

class Update
{
    /**
     * @see https://core.telegram.org/bots/api#getupdates
     */
    public function __construct(
        public readonly string              $updateId,
        public readonly ?Message            $message,
        public readonly ?Message            $editedMessage,
        public readonly ?Message            $channelPost,
        public readonly ?Message            $editedChannelPost,
        public readonly ?InlineQuery        $inlineQuery,
        public readonly ?ChosenInlineResult $chosenInlineResult,
        public readonly ?CallbackQuery      $callbackQuery,
        public readonly ?ShippingQuery      $shippingQuery,
        public readonly ?PreCheckoutQuery   $preCheckoutQuery,
        public readonly ?Poll               $poll,
        public readonly ?PollAnswer         $pollAnswer,
        public readonly ?ChatMemberUpdated  $chatMemberUpdated,
        public readonly ?ChatMemberUpdated  $MemberUpdated,
        public readonly ?ChatJoinRequest    $chatJoinRequest
    )
    {
    }

    public static function makeFromArray(array $update): self
    {
        return new self(
            $update['update_id'],
            isset($update['message']) ? Message::makeFromArray($update['message']) : null,
            $update['edited_message'] ? Message::makeFromArray($update['edited_message']) : null,
            $update['channel_post'] ? Message::makeFromArray($update['channel_post']) : null,
            $update['edited_channel_post'] ? Message::makeFromArray($update['edited_channel_post']) : null,
            isset($update['inline_query']) ? InlineQuery::makeFromArray($update['inline_query']) : null,
            isset($update['chosen_inline_result']) ? ChosenInlineResult::makeFromArray($update['chosen_inline_result']) : null,
            isset($update['callback_query']) ? CallbackQuery::makeFromArray($update['callback_query']) : null,
            isset($update['shipping_query']) ? ShippingQuery::makeFromArray($update['shipping_query']) : null,
            isset($update['pre_checkout_query']) ? PreCheckoutQuery::makeFromArray($update['pre_checkout_query']) : null,
            isset($update['poll']) ? Poll::makeFromArray($update['poll']) : null,
            isset($update['poll_answer']) ? PollAnswer::makeFromArray($update['poll_answer']) : null,
            isset($update['my_chat_member']) ? ChatMemberUpdated::makeFromArray($update['my_chat_member']) : null,
            isset($update['chat_member']) ? ChatMemberUpdated::makeFromArray($update['chat_member']) : null,
            isset($update['chat_join_request']) ? ChatJoinRequest::makeFromArray($update['chat_join_request']) : null,
        );
    }

    public static function makeMultiplesFromArray(array $updates): array
    {
        $objects = [];

        foreach ($updates as $update) {
            $objects[] = self::makeFromArray($update);
        }

        return $objects;
    }
}
