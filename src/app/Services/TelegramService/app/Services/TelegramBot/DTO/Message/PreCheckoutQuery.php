<?php

namespace App\Services\TelegramService\app\Services\TelegramBot\DTO\Message;

use App\Services\TelegramService\app\Services\TelegramBot\DTO\User\User;

class PreCheckoutQuery
{
    public function __construct(
        public readonly string     $id,
        public readonly User       $from,
        public readonly string     $currency,
        public readonly int        $totalAmount,
        public readonly string     $invoicePayload,
        public readonly ?string    $shippingOptionId,
        public readonly ?OrderInfo $orderInfo
    )
    {
    }

    public static function makeFromArray(array $preCheckoutQuery): self
    {
        return new self(
            $preCheckoutQuery['id'],
            User::makeFromArray($preCheckoutQuery['from']),
            $preCheckoutQuery['currency'],
            $preCheckoutQuery['total_amount'],
            $preCheckoutQuery['invoice_payload'],
            $preCheckoutQuery[''] ?? null,
            $preCheckoutQuery[''] ?? null,
        );
    }
}
