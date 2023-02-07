<?php

namespace TelegramBot\Telegram\Domain\Services\Telegram\DTO\Payment;

class Invoice
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly string $startParameter,
        public readonly string $currency,
        public readonly int    $totalAmount
    )
    {
    }

    public static function makeFromArray(array $invoice): self
    {
        return new self(
            $invoice['title'],
            $invoice['description'],
            $invoice['start_parameter'],
            $invoice['currency'],
            $invoice['total_amount'],
        );
    }
}
