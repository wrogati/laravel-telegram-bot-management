<?php

namespace TelegramBot\Services\TelegramBot\DTO\Payment;

class SuccessfulPayment
{
    public function __construct(
        public readonly string     $currency,
        public readonly int        $totalAmount,
        public readonly string     $invoicePayload,
        public readonly ?string    $shippingOptionId,
        public readonly ?OrderInfo $orderInfo,
        public readonly ?string    $telegramPaymentChargeId,
        public readonly ?string    $providerPaymentChargeId
    )
    {
    }

    public static function makeFromArray(array $successfulPayment): self
    {
        return new self(
            $successfulPayment['currency'],
            $successfulPayment['total_amount'],
            $successfulPayment['invoice_payload'],
            $successfulPayment['shipping_option_id'],
            isset($successfulPayment['order_info']) ? OrderInfo::makeFromArray($successfulPayment['order_info']) : null,
            $successfulPayment['telegram_payment_charge_id'] ?? null,
            $successfulPayment['provider_payment_charge_id'] ?? null,
        );
    }
}