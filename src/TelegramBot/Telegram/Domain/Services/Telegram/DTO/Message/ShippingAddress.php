<?php

namespace TelegramBot\Telegram\Domain\Services\Telegram\DTO\Message;

class ShippingAddress
{
    public function __construct(
        public readonly string $countryCode,
        public readonly string $state,
        public readonly string $city,
        public readonly string $streetLineOne,
        public readonly string $streetLineTwo,
        public readonly string $postCode
    )
    {
    }

    public static function makeFromArray(array $shippingAddress): self
    {
        return new self(
            $shippingAddress['country_code'],
            $shippingAddress['state'],
            $shippingAddress['city'],
            $shippingAddress['street_line1'],
            $shippingAddress['street_line2'],
            $shippingAddress['post_code'],
        );
    }
}
