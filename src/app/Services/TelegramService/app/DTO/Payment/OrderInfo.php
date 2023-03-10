<?php

namespace App\Services\TelegramService\app\DTO\Payment;

use App\Services\TelegramService\app\DTO\Message\ShippingAddress;

class OrderInfo
{
    public function __construct(
        public readonly ?string                  $name,
        public readonly ?string                  $phoneNumber,
        public readonly ?string                  $email,
        public readonly ?ShippingAddress $shippingAddress
    )
    {
    }

    public static function makeFromArray(array $orderInfo): self
    {
        return new self(
            $orderInfo['name'] ?? null,
            $orderInfo['phone_number'] ?? null,
            $orderInfo['email'] ?? null,
            isset($orderInfo['shipping_address']) ? ShippingAddress::makeFromArray($orderInfo['shipping_address']) : null
        );
    }
}
