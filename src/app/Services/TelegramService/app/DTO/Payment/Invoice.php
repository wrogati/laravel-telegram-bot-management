<?php

namespace App\Services\TelegramService\app\DTO\Payment;

use TelegramBot\Shared\Domain\Traits\ObjectToArray;

class Invoice
{
    use ObjectToArray;

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
