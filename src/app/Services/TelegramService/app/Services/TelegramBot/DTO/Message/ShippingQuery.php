<?php

namespace TelegramBot\Services\TelegramBot\DTO\Message;

use TelegramBot\Services\TelegramBot\DTO\User\User;

class ShippingQuery
{
    public function __construct(
        public readonly string          $id,
        public readonly User            $from,
        public readonly string          $invoicePayload,
        public readonly ShippingAddress $shippingAddress
    )
    {
    }

    public static function makeFromArray(array $shippingQuery): self
    {
        return new self(
            $shippingQuery['id'],
            User::makeFromArray($shippingQuery['from']),
            $shippingQuery['invoice_payload'],
            ShippingAddress::makeFromArray($shippingQuery['shipping_address'])
        );
    }
}