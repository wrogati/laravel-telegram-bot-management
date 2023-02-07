<?php

namespace TelegramBot\Telegram\Domain\Services\Telegram\DTO;

class WebAppData
{
    public function __construct(
        public readonly string $data,
        public readonly string $buttonText
    )
    {
    }

    public static function makeFromArray(array $data): self
    {
        return new self(
            $data['data'],
            $data['button_text']
        );
    }
}
